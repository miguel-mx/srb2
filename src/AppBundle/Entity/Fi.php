<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fi
 *
 * @ORM\Table(name="fi")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FiRepository")
 */
class Fi
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="origen", type="string", length=255)
     */
    private $origen;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="fi", type="string", length=255)
     */
    private $fi;

    /**
     * @var string
     *
     * @ORM\Column(name="cuartil", type="string", length=255)
     */
    private $cuartil;

    /**
     * Many fi have one journal. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Journal", inversedBy="fi")
     * @ORM\JoinColumn(name="journal_id", referencedColumnName="id")
     */
    private $journal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime",  nullable=true)
     */
    private $created;


    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     *
     * @return Fi
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * @param mixed $journal
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set origen.
     *
     * @param string $origen
     *
     * @return Fi
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;

        return $this;
    }

    /**
     * Get origen.
     *
     * @return string
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set year.
     *
     * @param int $year
     *
     * @return Fi
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year.
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set fi.
     *
     * @param string $fi
     *
     * @return Fi
     */
    public function setFi($fi)
    {
        $this->fi = $fi;

        return $this;
    }

    /**
     * Get fi.
     *
     * @return string
     */
    public function getFi()
    {
        return $this->fi;
    }

    /**
     * Set cuartil.
     *
     * @param string $cuartil
     *
     * @return Fi
     */
    public function setCuartil($cuartil)
    {
        $this->cuartil = $cuartil;

        return $this;
    }

    /**
     * Get cuartil.
     *
     * @return string
     */
    public function getCuartil()
    {
        return $this->cuartil;
    }

    public function __toString()
    {
        return (string) $this->name;
    }
}
