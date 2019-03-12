<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referencia
 *
 * @ORM\Table(name="Referencia", indexes={@ORM\Index(name="IDX_8F4F1008A76ED395", columns={"user_id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReferenciaRepository")
 */
class Referencia
{
    /**
     * @var string
     *
     * @ORM\Column(name="authors", type="text")
     */
    private $authors;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=1500, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=250, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="yearPreprint", type="string", length=4, nullable=true)
     */
    private $yearpreprint;

    /**
     * @var string
     *
     * @ORM\Column(name="yearPub", type="string", length=4, nullable=true)
     */
    private $yearpub;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="publication", type="string", length=250, nullable=true)
//     */
//    private $publication;

    /**
     * @var string
     *
     * @ORM\Column(name="journal", type="string", length=250, nullable=true)
     */
    private $journal;

    /**
     * @var string
     *
     * @ORM\Column(name="issue", type="string", length=10, nullable=true)
     */
    private $issue;

    /**
     * @var string
     *
     * @ORM\Column(name="pages", type="string", length=30, nullable=true)
     */
    private $pages;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="corporateAuthor", type="string", length=250, nullable=true)
//     */
////    private $corporateauthor;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=250, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=1500, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="abst", type="string", length=2500, nullable=true)
     */
    private $abst;

    /**
     * @var string
     *
     * @ORM\Column(name="publisher", type="string", length=250, nullable=true)
     */
    private $publisher;

    /**
     * @var string
     *
     * @ORM\Column(name="placePub", type="string", length=250, nullable=true)
     */
    private $placepub;

    /**
     * @var string
     *
     * @ORM\Column(name="editor", type="string", length=250, nullable=true)
     */
    private $editor;

    /**
     * @var string
     *
     * @ORM\Column(name="issn", type="string", length=250, nullable=true)
     */
    private $issn;

    /**
     * @var string
     *
     * @ORM\Column(name="isbn", type="string", length=250, nullable=true)
     */
    private $isbn;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="medium", type="string", length=250, nullable=true)
//     */
//    private $medium;

    /**
     * @var string
     *
     * @ORM\Column(name="notas", type="string", length=2500, nullable=true)
     */
    private $notas;

    /**
     * @var boolean
     *
     * @ORM\Column(name="revision", type="boolean", nullable=true)
     */
    private $revision;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=250, nullable=true)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="doi", type="string", length=500, nullable=true)
     */
    private $doi;

    /**
     * @var string
     *
     * @ORM\Column(name="arxiv", type="string", length=500, nullable=true)
     */
    private $arxiv;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="mathscinet", type="string", length=250, nullable=true)
//     */
//    private $mathscinet;

    /**
     * @var string
     *
     * @ORM\Column(name="zmath", type="string", length=250, nullable=true)
     */
    private $zmath;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="inspires", type="string", length=250, nullable=true)
//     */
//    private $inspires;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=true)
     */
    private $modified;

    /**
     * @var string
     *
     * @ORM\Column(name="volume", type="string", length=10, nullable=true)
     */
    private $volume;

    /**
     * @var string
     *
     * @ORM\Column(name="reportNumber", type="string", length=250, nullable=true)
     */
    private $reportnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="msc", type="string", length=1500, nullable=true)
     */
    private $msc;

    /**
     * @var string
     *
     * @ORM\Column(name="mrNumber", type="string", length=1500, nullable=true)
     */
    private $mrnumber;

    /**
     * @var string
     *
     * @ORM\Column(name="bookTitle", type="string", length=1500, nullable=true)
     */
    private $booktitle;

    /**
     * @var string
     *
     * @ORM\Column(name="school", type="string", length=250, nullable=true)
     */
    private $school;

    /**
     * @var string
     *
     * @ORM\Column(name="advisor", type="string", length=250, nullable=true)
     */
    private $advisor;

    /**
     * @var string
     *
     * @ORM\Column(name="thesisType", type="string", length=250, nullable=true)
     */
    private $thesistype;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\FosUser
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Author", inversedBy="referencia")
     * @ORM\JoinTable(name="referencia_author",
     *   joinColumns={
     *     @ORM\JoinColumn(name="referencia_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     *   }
     * )
     */
    private $author;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->author = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set authors
     *
     * @param string $authors
     *
     * @return Referencia
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return string
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Referencia
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Referencia
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set yearpreprint
     *
     * @param string $yearpreprint
     *
     * @return Referencia
     */
    public function setYearpreprint($yearpreprint)
    {
        $this->yearpreprint = $yearpreprint;

        return $this;
    }

    /**
     * Get yearpreprint
     *
     * @return string
     */
    public function getYearpreprint()
    {
        return $this->yearpreprint;
    }

    /**
     * Set yearpub
     *
     * @param string $yearpub
     *
     * @return Referencia
     */
    public function setYearpub($yearpub)
    {
        $this->yearpub = $yearpub;

        return $this;
    }

    /**
     * Get yearpub
     *
     * @return string
     */
    public function getYearpub()
    {
        return $this->yearpub;
    }

//    /**
//     * Set publication
//     *
//     * @param string $publication
//     *
//     * @return Referencia
//     */
//    public function setPublication($publication)
//    {
//        $this->publication = $publication;
//
//        return $this;
//    }
//
//    /**
//     * Get publication
//     *
//     * @return string
//     */
//    public function getPublication()
//    {
//        return $this->publication;
//    }

    /**
     * Set journal
     *
     * @param string $journal
     *
     * @return Referencia
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * Get journal
     *
     * @return string
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * Set issue
     *
     * @param string $issue
     *
     * @return Referencia
     */
    public function setIssue($issue)
    {
        $this->issue = $issue;

        return $this;
    }

    /**
     * Get issue
     *
     * @return string
     */
    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * Set pages
     *
     * @param string $pages
     *
     * @return Referencia
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return string
     */
    public function getPages()
    {
        return $this->pages;
    }

//    /**
//     * Set corporateauthor
//     *
//     * @param string $corporateauthor
//     *
//     * @return Referencia
//     */
//    public function setCorporateauthor($corporateauthor)
//    {
//        $this->corporateauthor = $corporateauthor;
//
//        return $this;
//    }
//
//    /**
//     * Get corporateauthor
//     *
//     * @return string
//     */
//    public function getCorporateauthor()
//    {
//        return $this->corporateauthor;
//    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Referencia
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Referencia
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set abst
     *
     * @param string $abst
     *
     * @return Referencia
     */
    public function setAbst($abst)
    {
        $this->abst = $abst;

        return $this;
    }

    /**
     * Get abst
     *
     * @return string
     */
    public function getAbst()
    {
        return $this->abst;
    }

    /**
     * Set publisher
     *
     * @param string $publisher
     *
     * @return Referencia
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;

        return $this;
    }

    /**
     * Get publisher
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Set placepub
     *
     * @param string $placepub
     *
     * @return Referencia
     */
    public function setPlacepub($placepub)
    {
        $this->placepub = $placepub;

        return $this;
    }

    /**
     * Get placepub
     *
     * @return string
     */
    public function getPlacepub()
    {
        return $this->placepub;
    }

    /**
     * Set editor
     *
     * @param string $editor
     *
     * @return Referencia
     */
    public function setEditor($editor)
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get editor
     *
     * @return string
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Set issn
     *
     * @param string $issn
     *
     * @return Referencia
     */
    public function setIssn($issn)
    {
        $this->issn = $issn;

        return $this;
    }

    /**
     * Get issn
     *
     * @return string
     */
    public function getIssn()
    {
        return $this->issn;
    }

    /**
     * Set isbn
     *
     * @param string $isbn
     *
     * @return Referencia
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get isbn
     *
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

//    /**
//     * Set medium
//     *
//     * @param string $medium
//     *
//     * @return Referencia
//     */
//    public function setMedium($medium)
//    {
//        $this->medium = $medium;
//
//        return $this;
//    }
//
//    /**
//     * Get medium
//     *
//     * @return string
//     */
//    public function getMedium()
//    {
//        return $this->medium;
//    }

    /**
     * Set notas
     *
     * @param string $notas
     *
     * @return Referencia
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;

        return $this;
    }

    /**
     * Get notas
     *
     * @return string
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Set revision
     *
     * @param boolean $revision
     *
     * @return Referencia
     */
    public function setRevision($revision)
    {
        $this->revision = $revision;

        return $this;
    }

    /**
     * Get revision
     *
     * @return boolean
     */
    public function getRevision()
    {
        return $this->revision;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return Referencia
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Referencia
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set doi
     *
     * @param string $doi
     *
     * @return Referencia
     */
    public function setDoi($doi)
    {
        $this->doi = $doi;

        return $this;
    }

    /**
     * Get doi
     *
     * @return string
     */
    public function getDoi()
    {
        return $this->doi;
    }

    /**
     * Set arxiv
     *
     * @param string $arxiv
     *
     * @return Referencia
     */
    public function setArxiv($arxiv)
    {
        $this->arxiv = $arxiv;

        return $this;
    }

    /**
     * Get arxiv
     *
     * @return string
     */
    public function getArxiv()
    {
        return $this->arxiv;
    }

//    /**
//     * Set mathscinet
//     *
//     * @param string $mathscinet
//     *
//     * @return Referencia
//     */
//    public function setMathscinet($mathscinet)
//    {
//        $this->mathscinet = $mathscinet;
//
//        return $this;
//    }
//
//    /**
//     * Get mathscinet
//     *
//     * @return string
//     */
//    public function getMathscinet()
//    {
//        return $this->mathscinet;
//    }

    /**
     * Set zmath
     *
     * @param string $zmath
     *
     * @return Referencia
     */
    public function setZmath($zmath)
    {
        $this->zmath = $zmath;

        return $this;
    }

    /**
     * Get zmath
     *
     * @return string
     */
    public function getZmath()
    {
        return $this->zmath;
    }

//    /**
//     * Set inspires
//     *
//     * @param string $inspires
//     *
//     * @return Referencia
//     */
//    public function setInspires($inspires)
//    {
//        $this->inspires = $inspires;
//
//        return $this;
//    }
//
//    /**
//     * Get inspires
//     *
//     * @return string
//     */
//    public function getInspires()
//    {
//        return $this->inspires;
//    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Referencia
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Referencia
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set volume
     *
     * @param string $volume
     *
     * @return Referencia
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    /**
     * Get volume
     *
     * @return string
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set reportnumber
     *
     * @param string $reportnumber
     *
     * @return Referencia
     */
    public function setReportnumber($reportnumber)
    {
        $this->reportnumber = $reportnumber;

        return $this;
    }

    /**
     * Get reportnumber
     *
     * @return string
     */
    public function getReportnumber()
    {
        return $this->reportnumber;
    }

    /**
     * Set msc
     *
     * @param string $msc
     *
     * @return Referencia
     */
    public function setMsc($msc)
    {
        $this->msc = $msc;

        return $this;
    }

    /**
     * Get msc
     *
     * @return string
     */
    public function getMsc()
    {
        return $this->msc;
    }

    /**
     * Set mrnumber
     *
     * @param string $mrnumber
     *
     * @return Referencia
     */
    public function setMrnumber($mrnumber)
    {
        $this->mrnumber = $mrnumber;

        return $this;
    }

    /**
     * Get mrnumber
     *
     * @return string
     */
    public function getMrnumber()
    {
        return $this->mrnumber;
    }

    /**
     * Set booktitle
     *
     * @param string $booktitle
     *
     * @return Referencia
     */
    public function setBooktitle($booktitle)
    {
        $this->booktitle = $booktitle;

        return $this;
    }

    /**
     * Get booktitle
     *
     * @return string
     */
    public function getBooktitle()
    {
        return $this->booktitle;
    }

    /**
     * Set school
     *
     * @param string $school
     *
     * @return Referencia
     */
    public function setSchool($school)
    {
        $this->school = $school;

        return $this;
    }

    /**
     * Get school
     *
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set advisor
     *
     * @param string $advisor
     *
     * @return Referencia
     */
    public function setAdvisor($advisor)
    {
        $this->advisor = $advisor;

        return $this;
    }

    /**
     * Get advisor
     *
     * @return string
     */
    public function getAdvisor()
    {
        return $this->advisor;
    }

    /**
     * Set thesistype
     *
     * @param string $thesistype
     *
     * @return Referencia
     */
    public function setThesistype($thesistype)
    {
        $this->thesistype = $thesistype;

        return $this;
    }

    /**
     * Get thesistype
     *
     * @return string
     */
    public function getThesistype()
    {
        return $this->thesistype;
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
     * @param \AppBundle\Entity\FosUser $user
     *
     * @return Referencia
     */
    public function setUser(\AppBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add author
     *
     * @param \AppBundle\Entity\Author $author
     *
     * @return Referencia
     */
    public function addAuthor(\AppBundle\Entity\Author $author)
    {
        $this->author[] = $author;

        return $this;
    }

    /**
     * Remove author
     *
     * @param \AppBundle\Entity\Author $author
     */
    public function removeAuthor(\AppBundle\Entity\Author $author)
    {
        $this->author->removeElement($author);
    }

    /**
     * Get author
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
