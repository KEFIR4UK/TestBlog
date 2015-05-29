<?php

namespace My\BlogBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * Blog
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="My\BlogBundle\Entity\BlogRepository")
 */
class Blog
{
    /**
     *
     * @ORM\OneToMany(targetEntity="Comment",mappedBy="blog");
     */
    private $comment;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="datecreate", type="date")
     */
    private $datecreate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateupdate", type="date")
     */
    private $dateupdate;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="tag", type="string", length=255)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;
    
    
     /**
     * @var  smallint
     *
     * @ORM\Column(name="for_auth_user", type="boolean")
     */
    private $for_auth_user;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text")
     */
    private $text;
    
    
     public function __construct() {
        $this->comment = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Blog
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
     * Set datecreate
     * @ORM\PrePersist
     * @param \DateTime $datecreate
     * @return Blog
     */
    public function setDatecreate()
    {
        $this->datecreate = new \DateTime();

        return $this;
    }

    /**
     * Get datecreate
     *
     * @return \DateTime 
     */
    public function getDatecreate()
    {
        return $this->datecreate;
    }

    /**
     * Set dateupdate
     * @ORM\PreUpdate 
     * @param \DateTime $dateupdate
     * @return Blog
     */
    public function setDateupdate()
    {
        $this->dateupdate = new \DateTime();

        return $this;
    }

    /**
     * Get dateupdate
     *
     * @return \DateTime 
     */
    public function getDateupdate()
    {
        return $this->dateupdate;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Blog
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return Blog
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return Blog
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Blog
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
     public function getText($count = NULL) {
        if ($count != NULL) {
            $arr = explode(' ', $this->text);
            $arr = array_slice($arr, 0, $count);
            $this->text = implode(' ', $arr) . '...';
        }
        return $this->text;
    }

    /**
     * Add comment
     *
     * @param \My\BlogBundle\Entity\Comment $comment
     * @return Blog
     */
    public function addComment(\My\BlogBundle\Entity\Comment $comment)
    {
        $this->comment[] = $comment;
    
        return $this;
    }

    /**
     * Remove comment
     *
     * @param \My\BlogBundle\Entity\Comment $comment
     */
    public function removeComment(\My\BlogBundle\Entity\Comment $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set for_auth_user
     *
     * @param integer $forAuthUser
     * @return Blog
     */
    public function setForAuthUser($forAuthUser)
    {
        $this->for_auth_user = $forAuthUser;
    
        return $this;
    }

    /**
     * Get for_auth_user
     *
     * @return integer 
     */
    public function getForAuthUser()
    {
        return $this->for_auth_user;
    }
    
    public function __toString() {
       return $this->title;
    }
   

/**
 * Unmapped property to handle file uploads
 */
private $file;

/**
 * Sets file.
 *
 * @param UploadedFile $file
 */


/**
 * Get file.
 *
 * @return UploadedFile
 */
public function getFile()
{
    return $this->file;
}

 private $temp;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image img
        if (is_file($this->getAbsolutePath())) {
            // store the old name to delete after the update
            $this->temp = $this->getAbsolutePath();
        } else {
            $this->img = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $this->img = $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image img
            $this->temp = null;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->id.'.'.$this->getFile()->guessExtension()
        );

        $this->setFile(null);
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            unlink($this->temp);
        }
    }

    public function getAbsolutePath()
    {
        return null === $this->img
            ? null
            : $this->getUploadRootDir().'/'.$this->id.'.'.$this->img;
    }
    
      protected function getUploadRootDir()
    {
        // the absolute directory img where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'images/Blog';
    }
 
    
}
    

