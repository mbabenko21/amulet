<?php

namespace Amulet\Entity;

use Amulet\Service\AccountService;
use Doctrine\ORM\Mapping as ORM;

/**
 * AccountOptions
 *
 * @ORM\Table(name="accounts_options")
 * @ORM\Entity
 */
class AccountOptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="role", type="integer")
     */
    private $role = AccountService::DEFAULT_ROLE;

    /**
     * @var \Amulet\Entity\Account
     *
     * @ORM\OneToOne(targetEntity="Amulet\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id", unique=true)
     * })
     */
    private $account;


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
     * Set name
     *
     * @param string $name
     *
     * @return AccountOptions
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
     * Set role
     *
     * @param integer $role
     *
     * @return AccountOptions
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return integer 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set account
     *
     * @param \Amulet\Entity\Account $account
     *
     * @return AccountOptions
     */
    public function setAccount(\Amulet\Entity\Account $account = null)
    {
        $this->account = $account;
    
        return $this;
    }

    /**
     * Get account
     *
     * @return \Amulet\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
}
