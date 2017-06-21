# Magento2-Product-Labels

Prints a simple Sale label and New in Magento Category page

# How to use

1. Instanciate the helper within list.phtml (inside foreach)

```
$labels = $this->helper('Wirelab\ProductLabels\Helper\Labels');
```

2. Add the HTML anywhere inside the foreach statement

```
<?php if($labels->isProductNew($_product)) : ?>
    <span class="label label-new">
        <?php echo __('New'); ?>
    </span>
<?php endif; ?>

<?php if($labels->isProductOnSale($_product)) : ?>
    <span class="label label-sale">
        <?php echo __('Sale'); ?>
    </span>
<?php endif; ?>
```
