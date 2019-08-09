# Introduction

## Purpose and Goal

Purpose: This is a course to improve developing skill for bridge system engineer, and experiment the process of building system from system requirement.

Goal: In 2 weeks, build a simple and usable system (Equipment management system for the company).

## Working style

* The lesson takes one hour everyday, after that you must learn by yourself, working hard.
* Discuss with other member actively.
* You must complete the tasks, no matter what you are busy or not take part in the lesson offline.

## Project

Until now, we use an [Excel file](https://docs.google.com/spreadsheets/d/1sVi0L5JkISjlIEoPzRzVbnmQRUb8hJRDNzGc4odk-oA/edit#gid=0) to manage the equipment of the company.
It has some issues:
1. Miss information input by human error, inconvenince.
2. No action history, no report.
3. Hard to share information to another system.

We will create an *Equipment Management* system.

### [Project Plan](./files/ProjectPlan.md)

Project plan is what the team commit to do, and how to do them.

## [Development environment setup](./files/EnvironmentSetup.md)

* Pure setup.
* [Install Postgres](./files/InstallPostgres.md). More general compare to MySQL.
* [Install PHP](./files/InstallPhp.md), yii2 framework. Easy to learn, the framework support fucntion we should reinforce.
* [Install Apache](./files/InstallApache.md). Easy to setup on Windows.

## Coding convention

* Refer to [PSR-2](https://www.php-fig.org/psr/psr-2/) or [Yii2 core framework code style](https://github.com/yiisoft/yii2/blob/master/docs/internals/core-code-style.md)
* You must follow the coding convention STRICTLY.

## Tools

* [A5:SQL Mk-2](https://a5m2.mmatsubara.com/index.en.html) to draw ERD
  * Support draw ERD, multiple SQL system, export to Excel (use for documentation).
  * Work only on Windows. Japanese only.
* IDE (VS Code or Eclipse PDT?)
* Ticket management: Redmine
* Gitlab
* [Git](https://git-scm.com/), [TortoiseGit](https://tortoisegit.org/) or [Sourcetree](https://www.sourcetreeapp.com/)
* [draw.io](https://www.draw.io/) to draw UML (Use cases, Activity, Sequence diagram).
* Composer [ComposerSetup](https://getcomposer.org/Composer-Setup.exe)

## Workflow

* Requirement -> Design -> Coding -> Test -> Merge -> Release
* Ticket work flow

## Homework

1. Build your own development environtment.

## Preparation

1. Learn PHP (you have 3 days).
2. Slightly see about Yii2 framework
  * Website https://www.yiiframework.com/
  * Quick tutorial https://www.yiiframework.com/doc/guide/2.0/en/start-workflow
  * Tutorial https://www.yiiframework.com/doc/guide/2.0/en

## References

* [Lesson format](./files/LessonFormat.md)
