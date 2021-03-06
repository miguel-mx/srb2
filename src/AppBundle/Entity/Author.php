<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Author
 *
 * @ORM\Table(name="Author", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_BA03DDFEA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class Author
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=120, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="text", nullable=false)
     */
    private $alias;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Referencia", mappedBy="author")
     */
    private $referencia;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=false)
     */
    private $slug;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->referencia = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Author
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Author
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add referencium
     *
     * @param \AppBundle\Entity\Referencia $referencium
     *
     * @return Author
     */
    public function addReferencium(\AppBundle\Entity\Referencia $referencium)
    {
        $this->referencia[] = $referencium;

        return $this;
    }

    /**
     * Remove referencium
     *
     * @param \AppBundle\Entity\Referencia $referencium
     */
    public function removeReferencium(\AppBundle\Entity\Referencia $referencium)
    {
        $this->referencia->removeElement($referencium);
    }

    /**
     * Get referencia
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReferencia()
    {
        return $this->referencia;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function __toString()
    {
        return (string) $this->name;
    }
}
