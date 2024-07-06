<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interface\TeacherRepositoryInterface;
use App\Repositories\Interface\ClassRepositoryInterface;
use App\Repositories\Interface\SectionRepositoryInterface;
use App\Repositories\Interface\SubjectRepositoryInterface;
use App\Repositories\Interface\SlotRepositoryInterface;

class TimetableController extends Controller
{
    protected $teacherRepository;
    protected $classRepository;
    protected $sectionRepository;
    protected $subjectRepository;
    protected $slotRepository;

    public function __construct(
        TeacherRepositoryInterface $teacherRepository,
        ClassRepositoryInterface $classRepository,
        SectionRepositoryInterface $sectionRepository,
        SubjectRepositoryInterface $subjectRepository,
        SlotRepositoryInterface $slotRepository
    ) {
        $this->teacherRepository = $teacherRepository;
        $this->classRepository = $classRepository;
        $this->sectionRepository = $sectionRepository;
        $this->subjectRepository = $subjectRepository;
        $this->slotRepository = $slotRepository;
    }

    public function index(Request $request)
    {
        $classes = $this->classRepository->all();
        $slots = $this->slotRepository->all();
        $breakSlot = $this->slotRepository->getBreakSlot();

        $timetable = [];
        $assignedTeachers = []; // Track assigned teachers by slot

        foreach ($classes as $class) {
            $sections = $this->sectionRepository->findByClassId($class->id);
            foreach ($sections as $section) {
                $subjects = $this->subjectRepository->findByClassId($class->id);
                foreach ($slots as $slot) {
                    if ($slot->is_break) {
                        // Assign break
                        $timetable[$class->name][$section->name][$slot->start_time . ' - ' . $slot->end_time] = 'Break';
                        continue;
                    }

                    // Randomly select a subject for the slot
                    $subject = $subjects->random();

                    // Find an available teacher who is not assigned to the same slot across different classes/sections
                    $teacher = $this->getAvailableRandomTeacher($slot->id, $assignedTeachers);

                    if ($teacher) {
                        // Assign the teacher to the current slot
                        $timetable[$class->name][$section->name][$slot->start_time . ' - ' . $slot->end_time] = [
                            'subject' => $subject->name,
                            'teacher' => $teacher->name,
                        ];

                        // Track this teacher's assignment
                        $assignedTeachers[$slot->id][$teacher->id] = true;
                    } else {
                        // Handle the case where no teacher is available (optional)
                        $timetable[$class->name][$section->name][$slot->start_time . ' - ' . $slot->end_time] = [
                            'subject' => $subject->name,
                            'teacher' => 'No available teacher',
                        ];
                    }
                }
            }
        }

        return view('timetable', compact('timetable'));
    }

    /**
     * Get an available teacher who is not already assigned to the given slot.
     *
     * @param int $slotId
     * @param array $assignedTeachers
     * @return \App\Models\Teacher|null
     */
    private function getAvailableRandomTeacher($slotId, &$assignedTeachers)
    {
        // Get all teachers and shuffle them to ensure random selection
        $teachers = $this->teacherRepository->all()->shuffle();

        foreach ($teachers as $teacher) {
            if (!isset($assignedTeachers[$slotId][$teacher->id])) {
                return $teacher;
            }
        }

        return null;
    }
}
