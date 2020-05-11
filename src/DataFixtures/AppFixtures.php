<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Project;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getProjectData() as [$fullname, $active]) {
            $project = new Project();
            $project->setName($fullname);
            $project->setActive($active);
            $manager->persist($project);
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
}