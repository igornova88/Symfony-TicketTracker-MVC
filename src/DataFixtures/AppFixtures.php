<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Project;
use App\Entity\User;
use App\Entity\Comment;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {        
        $this->loadProjects($manager);
        $this->loadUsers($manager);
        $this->loadComments($manager);
        $this->loadTask($manager);
    }
    
    private function loadProjects(ObjectManager $manager): void
    {
        foreach ($this->getProjectData() as [$fullname, $active]) {
            $project = new Project();
            $project->setName($fullname);
            $project->setActive($active);
            $manager->persist($project);
        }

        $manager->flush();
    }

    private function loadUsers(ObjectManager $manager): void
    {
        foreach ($this->getUserData() as [$name, $lastname, $username, $password, $email, $roles]) {
            $user = new User();
            $user->setName($name);
            $user->setLastName($lastname);
            $user->setUsername($username);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setEmail($email);
            $user->setRoles($roles);

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function loadComments(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 3; $i++) {
            $comment = new Comment();
            $comment->setText('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');

            $manager->persist($comment);
        }

        $manager->flush();
    }

    private function loadTask(ObjectManager $manager): void
    {
        foreach ($this->getTaskData() as [$description, $title, $timespent, $timeEstimated]) {
            $task = new Comment();
            $task->setDescription($description);
            $task->setTitle($title);
            $task->setTimeSpent($timeSpent);
            $task->setTimeEstimated($timeEstimated);
            $manager->persist($task);
        }
        $manager->flush();
    }

    private function getProjectData(): array
    {
        return [
            // $userData = [$proje1ctName, $active];
            ['Project One', 1],
            ['Project Two', 1],
            ['Project Three', 0],
        ];
    }

    private function getUserData(): array
    {
        return [
            // $userData = [$name, $lastname, $username, $password, $email, $roles];
            ['Jane', 'Doe', 'jane_admin', 'kitten', 'jane_admin@symfony.com', ['ROLE_ADMIN']],
            ['Tom', 'Doe', 'tom_admin', 'kitten', 'tom_admin@symfony.com', ['ROLE_ADMIN']],
            ['John', 'Doe', 'john_user', 'kitten', 'john_user@symfony.com', ['ROLE_USER']],
        ];
    }

    private function getTaskData(): array
    {
        return [
            // $userData = [$description, $title, $timespent, $timeEstimated];
            ['add static files for app shell', 'Task1', '[10h]', ['10h']],
            ['add static footer, breadcrumbs, page title, menu subtitl', 'Task2', '[5h]', ['10h']],
            ['add jqGrid with static data, and matchin style', 'Task3', '[2h]', ['30h']],
            ['Add symfony framework and first route', 'Task4', '[2h]', ['30h']],
            ['Add Project entity with basic fields and form for that entity', 'Task5', '[2h]', ['30h']],
            ['make ProjectController and start on CRUD for Project', 'Task6', '[2h]', ['30h']],
            ['Add data fixtures for Project entitiy', 'Task7', '[2h]', ['30h']],
            ['add Task entity', 'Task8', '[2h]', ['30h']],
            ['remove unused icons', 'Task9', '[2h]', ['30h']],
            ['Add User entity and fixtures', 'Task10', '[2h]', ['30h']],
            ['Add new fields to User entity', 'Task3', '[2h]', ['30h']],
            ['Add login page template', 'Task3', '[2h]', ['30h']],
            ['Set template for new user and user list', 'Task3', '[2h]', ['30h']],
            ['Add Fixtures for Task', 'Task3', '[2h]', ['30h']],
            ['Remove some comments', 'Task3', '[2h]', ['30h']],
            ['Update notes', 'Task3', '[2h]', ['30h']],
            ['Add Webpack Encore and enable SASS', 'Task3', '[2h]', ['30h']],
            ['Add Comment fixture', 'Task3', '[2h]', ['30h']],
            ['read excel files', 'Task3', '[2h]', ['30h']],
        ];
    }
}