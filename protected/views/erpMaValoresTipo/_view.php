<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->nombre), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->idCategoria->nombre)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->idCategoria->nombre);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->validacion)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('validacion')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->validacion);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->timestamp)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('timestamp')); ?>:</b>
            </div>
<div class="field_value">
                <?php
                echo date('D, d M y H:i:s', strtotime($data->timestamp));
                ?>

        </div>
        </div>

        <?php
    }
    ?>
</div>