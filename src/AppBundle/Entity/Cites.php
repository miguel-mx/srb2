<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cites
 *
 * @ORM\Table(name="cites")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CitesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Cites
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
     * @ORM\Column(name="cite", type="text")
     */
    private $cite;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="doi", type="string", length=255)
     */
    private $doi;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * Many cites have one reference. This is the owning side.
     * @ORM\ManyToOne(targetEntity="Referencia", inversedBy="cites")
     * @ORM\JoinColumn(name="references_id", referencedColumnName="id")
     */
    private $references;

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }



    /**
     * @return mixed
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @param mixed $references
     */
    public function setReferences($references)
    {
        $this->references = $references;
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
     * Set cite.
     *
     * @param string $cite
     *
     * @return Cites
     */
    public function setCite($cite)
    {
        $this->cite = $cite;

        return $this;
    }

    /**
     * Get cite.
     *
     * @return string
     */
    public function getCite()
    {
        return $this->cite;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Cites
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set doi.
     *
     * @param string $doi
     *
     * @return Cites
     */
    public function setDoi($doi)
    {
        $this->doi = $doi;

        return $this;
    }

    /**
     * Get doi.
     *
     * @return string
     */
    public function getDoi()
    {
        return $this->doi;
    }

    /**
     * Set created.
     *
     * @ORM\PrePersist
     */
    public function setCreated()
    {
        $this->created = new \DateTime();
    }

    /**
     * Get created.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    public function __toString()
    {
        return (string) $this->reference;
    }
}
