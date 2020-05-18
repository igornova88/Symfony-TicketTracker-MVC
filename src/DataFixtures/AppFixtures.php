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
    }
    




    private function loadProjects(ObjectManager $manager): void
    {
        // @todo - change this to loadProjects
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
        for ($i; $i <= 3; $i++) {
            $comment = new Comment();
            $comment->setName('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.');

            $manager->persist($comment);
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
}