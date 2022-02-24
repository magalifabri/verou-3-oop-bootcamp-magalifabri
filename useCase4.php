<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

/*
We are preparing three types of content for a website:

Articles
Ads
Vacancies
All of those have a title and text. When showing the title, they are modified as follows: articles remain as they are, ads are shown in all caps and vacancies are appended with " - apply now!". The original title should still be retrievable, so no modification is permanent.

Have an array with two articles, one ad and one vacancy. Use this array to show all content types (title + text).

Bonus: an article can be marked as "breaking news". If this is the case, the title is prepended with "BREAKING: ". Extra bonus: display all the content with the appropriate html tags.
*/

class Content
{
    protected string $title;
    public string $text;

    public function __construct($title, $text)
    {
        $this->title = $title;
        $this->text = $text;
    }
}

class Article extends Content
{
    public bool $breakingNews;

    public function __construct($title, $text, $breakingNews = false)
    {
        parent::__construct($title, $text);
        $this->breakingNews = $breakingNews;
    }
    public function getTitle()
    {
        if ($this->breakingNews) {
            return 'BREAKING: ' . $this->title;
        } else {
            return $this->title;
        }
    }
}
class Ad extends Content
{
    public function getTitle()
    {
        return strtoupper($this->title);
    }
}
class Vacancy extends Content
{
    public function getTitle()
    {
        return $this->title . ' - apply now!';
    }
}

$content = [
    new Ad(
        'Butter',
        'Butter is slippery. That\'s why we eat as much as possible, to lubricate our arteries and veins'
    ),
    new Article(
        'Disappointed Baby Takes Plastic Bag Off Head After Reading ‘Warning: Not A Children’s Toy’',
        'WINNETKA, IL—Disappointed that the object was not the intriguing plaything he had initially perceived it to be, local 8-month-old child Josiah O’Connell reportedly removed the plastic bag from his head Wednesday after reading, “Warning: Not A…',
        true
    ),
    new Article(
        'Military Recruiter’s Pitch Surprisingly Upfront About How Many Civilians You Get To Kill',
        'HARVEY, IL—A group of high schoolers were reportedly left astonished Wednesday after a military recruiter’s pitch was surprisingly upfront about how many civilians you get to kill. “It wasn’t even hidden in there, it was, like, the second or third…',
    ),
    new Vacancy(
        'Surgeon Wanted',
        'for a new health clinic opening in the area. No experience needed. Must have own tools.'
    ),
];

foreach ($content as $item) {
    echo '<h3>' . $item->getTitle() . '</h3><br>';
    echo '<p>' . $item->text . '</p><br>';
}
