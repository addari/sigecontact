<div class="view">

    <h2><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</h2>
<h2><?php echo CHtml::link(CHtml::encode($data->valor), array('view', 'id' => $data->id)); ?></h2>

    <?php
    if (!empty($data->idContact->nombre)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_contact')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->idContact->nombre);
                ?>

            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!empty($data->idTipoValor->nombre)) {
        ?>
    <div class="field">
            <div class="field_name">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_valor')); ?>:</b>
            </div>
<div class="field_value">

                <?php
                echo CHtml::encode($data->idTipoValor->nombre);
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