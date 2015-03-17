<?php
/**
 * @author Stefano Torresi (http://stefanotorresi.it)
 * @license See the file LICENSE.txt for copying permission.
 * ************************************************
 */

namespace Doctrine\Tests\Models\CustomType;

use Doctrine\Tests\DbalTypes\CustomIdObject;

/**
 * @Entity
 * @Table(name="custom_id_type_child")
 */
class CustomIdObjectTypeChild
{
    /**
     * @Id @Column(type="CustomIdObject")
     *
     * @var CustomIdObject
     */
    public $id;

    /**
     * @ManyToOne(targetEntity="Doctrine\Tests\Models\CustomType\CustomIdObjectTypeParent", inversedBy="children")
     */
    public $parent;

    /**
     * @param CustomIdObject|string    $id
     * @param CustomIdObjectTypeParent $parent
     */
    public function __construct($id, CustomIdObjectTypeParent $parent)
    {
        if (! $id instanceof CustomIdObject) {
            $id = new CustomIdObject($id);
        }

        $this->id     = $id;
        $this->parent = $parent;
    }
}
