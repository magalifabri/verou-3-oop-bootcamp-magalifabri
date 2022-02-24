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

class Ad extends Content
{
    public function getTitle()
    {
        return $this->title;
    }
}
class Article extends Content
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

$ad = new Ad('Ad Title', 'Ad Text');
$article = new Article('Article Title', 'Article Text');
$vacancy = new Vacancy('Vacancy Title', 'Vacancy Text');

echo $ad->getTitle() . '<br>';
echo $article->getTitle() . '<br>';
echo $vacancy->getTitle() . '<br>';
