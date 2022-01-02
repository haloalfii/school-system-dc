ri<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTimetablesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('timetables', function (Blueprint $table) {
                $table->id();
                $table->enum('day', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);
                $table->enum('session', ['1, 07.00 - 08.40', '2, 08.50 - 10.40', '3, 10.50 - 12.20']);
                $table->foreignId('school_class_id');
                $table->foreignId('teacher_id');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('timetables');
        }
    }
