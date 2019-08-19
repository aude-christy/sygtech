<?php

class Planning 
{
    use EntityIndentifierTrait;
    
    /**
     * @ManyToone(targetEntity="Interventions", mappedBy="Planning")
     */
    private $Interventions;

    public function --construct()
    {
        
        $this->$Interventions = new ArrayCollection();
    }

    public function addInterventions(Interventions $Interventions)
    {
        $this->Interventions[] = $Interventions;
        return $this;

        $entityManager->persist(interventions);
        $entityManager->flush();
    }

    public getInterventions()
    {
        return $this->Interventions;

    }
    
    private $date_planning;
}
