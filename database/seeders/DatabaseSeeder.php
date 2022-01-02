<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Timetable;
use Facade\FlareClient\Time\Time;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Timetable::create([
            'day' => 'Monday',
            'session' => '1, 07.00 - 08.40',
            'school_class_id' => 1,
            'teacher_id' => 1
        ]);

        Timetable::create([
            'day' => 'Monday',
            'session' => '1, 07.00 - 08.40',
            'school_class_id' => 2,
            'teacher_id' => 2
        ]);

        Student::create([
            'student_number' => '18.11.2139',
            'name' => 'Alfian',
            'address' => 'Jogja',
            'email' => 'alfian@gmail.com',
            'phone_number' => '082082082082',
            'school_class_id' => 1
        ]);

        Student::create([
            'student_number' => '18.12.2139',
            'name' => 'Luthfi',
            'address' => 'Sleman',
            'email' => 'Luthfi@gmail.com',
            'phone_number' => '082082082082',
            'school_class_id' => 2
        ]);

        Course::create([
            'course_name' => 'Math',
        ]);

        Course::create([
            'course_name' => 'English',
        ]);

        Teacher::create([
            'teacher_number' => 'T0001',
            'name' => 'Guru Alfian',
            'address' => 'Sleman',
            'email' => 'admin@halo.alfi',
            'phone_number' => '081081081081',
            'course_id' => 1
        ]);

        Teacher::create([
            'teacher_number' => 'T0002',
            'name' => 'Guru Luthfi',
            'address' => 'Sleman',
            'email' => 'admin@halo.luthfi',
            'phone_number' => '081081081081',
            'course_id' => 2
        ]);

        SchoolClass::create([
            'class_name' => 'TKJ A',
        ]);

        SchoolClass::create([
            'class_name' => 'TKJ B',
        ]);
    }
}
