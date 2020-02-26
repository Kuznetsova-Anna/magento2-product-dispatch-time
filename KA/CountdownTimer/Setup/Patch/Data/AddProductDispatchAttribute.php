<?php

namespace KA\CountdownTimer\Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Catalog\Model\Product\Attribute\Source\Boolean as SourceBoolean;
use Magento\Catalog\Model\Product\Attribute\Backend\Boolean as BackendBoolean;


class AddProductDispatchAttribute implements DataPatchInterface
{

    protected $eavSetupFactory;

    protected $moduleDataSetup;

    public function __construct(EavSetupFactory $eavSetupFactory,
        ModuleDataSetupInterface $moduleDataSetupInterface)
    {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->moduleDataSetup = $moduleDataSetupInterface;
    }

    public function apply()
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute('catalog_product', 'show_dispatch_time', [
            'type' => 'int',
            'label' => 'Show Dispatch Time',
            'input' => 'boolean',
            'backend' => BackendBoolean::class,
            'source' => SourceBoolean::class,
            'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
            'used_in_product_listing' => true,
            'user_defined' => true,
            'value' => 0,
            'required' => false,
            'default' => '',
            'visible' => true,
            'sort_order' => 300,
            'position' => 300,
            'searchable' => false,
            'filterable' => false,
            'comparable' => false,
            'visible_on_front' => false,
            'unique' => false,
        ]);
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

}
