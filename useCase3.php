<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/*
There's two groups, both of 10 students. Every student has a name (even Jaqen) and gets a grade. You can have some fun coming up with the content here :-)

Provide an easy way to calculate the average score of a group.
Add a function to move a student from one group to another.
Show the average score of both groups. Move the top student from one group with the lowest scoring student from another. Show the averages again - how were these affected?
*/


// DEV FUNCTIONS

function pre_r($array)
{
    echo "<pre>";
    var_dump($array);
    echo "</pre>";
}

class Student
{
    public string $name;
    public float $score;

    public function __construct(string $name, float $score)
    {
        $this->name = $name;
        $this->score = $score;
    }
}

class StudentGroup
{
    public array $students;

    public function __construct(array $students)
    {
        if (count($students) !== 10) {
            echo 'not 10 <br>';
            return;
        }
        $this->students = [];
        foreach ($students as $student) {
            array_push($this->students, $student);
        }
    }

    public function calcAvgScore(): float
    {
        $totalScore = 0;

        foreach ($this->students as $student) {
            $totalScore += $student->score;
        }

        $avgScore = round($totalScore / count($this->students), 2);

        return $avgScore;
    }

    public function addStudent($student)
    {
        array_push($this->students, $student);
    }
    public function removeStudent($student)
    {
        $index = array_keys($this->students, $student)[0];

        array_splice($this->students, $index, 1);
    }
}

// create group 1
$student1 = new Student('student1', 1);
$student2 = new Student('student2', 2);
$student3 = new Student('student3', 3);
$student4 = new Student('student4', 4);
$student5 = new Student('student5', 5);
$student6 = new Student('student6', 6);
$student7 = new Student('student7', 7);
$student8 = new Student('student8', 8);
$student9 = new Student('student9', 9);
$student10 = new Student('student10', 10);

$group1 = new StudentGroup([
    $student1, $student2, $student3, $student4, $student5, $student6, $student7, $student8, $student9, $student10
]);

echo $group1->calcAvgScore() . '<br>';


// create group 2
$student11 = new Student('student11', 11);
$student12 = new Student('student12', 12);
$student13 = new Student('student13', 13);
$student14 = new Student('student14', 14);
$student15 = new Student('student15', 15);
$student16 = new Student('student16', 16);
$student17 = new Student('student17', 17);
$student18 = new Student('student18', 18);
$student19 = new Student('student19', 19);
$student20 = new Student('student20', 20);

$group2 = new StudentGroup([
    $student11, $student12, $student13, $student14, $student15, $student16, $student17, $student18, $student19, $student20
]);

echo $group2->calcAvgScore() . '<br>';


function moveStudent($student, $fromGroup, $toGroup)
{
    $studentInGroup = in_array($student, $fromGroup->students);
    if (!$studentInGroup) {
        echo 'student not in group <br>';
        return;
    }

    $toGroup->addStudent($student);
    $fromGroup->removeStudent($student);
}

function printGroupOverview($groupsStudents)
{
    echo ' contains: <br>';

    foreach ($groupsStudents as $student) {
        echo ' - ' . $student->name . '<br>';
    }
}


// move student
echo 'group1';
printGroupOverview($group1->students);
echo 'group2';
printGroupOverview($group2->students);

moveStudent($student1, $group1, $group2);
moveStudent($student3, $group1, $group2);
moveStudent($student5, $group1, $group2);

echo 'group1';
printGroupOverview($group1->students);
echo 'group2';
printGroupOverview($group2->students);

echo 'Score average group1: ' . $group1->calcAvgScore() . '<br>';
echo 'Score average group2: ' . $group2->calcAvgScore() . '<br>';
