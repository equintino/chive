<table class="list">
	<colgroup>
		<col style="width: 100px;" />
		<col class="type" />
		<col style="width: 100px;" />
		<col class="checkbox" />
		<col />
	</colgroup>
	<thead>
		<tr>
			<th><?php echo Yii::t('database', 'field'); ?></th>
			<th><?php echo Yii::t('database', 'type'); ?></th>
			<th><?php echo Yii::t('database', 'function'); ?></th>
			<th><?php echo Yii::t('database', 'null'); ?></th>
			<th><?php echo Yii::t('core', 'value'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 10; ?>
		<?php foreach($row->getMetaData()->tableSchema->columns AS $column) { ?>
			<tr>
				<td style="font-weight: bold;"><?php echo $column->name; ?></td>
				<td><?php echo $column->dbType; ?></td>
				<td><?php echo CHtml::dropDownList($column->name . '[function]','',$functions); ?></td>
				<td class="center">
					<?php echo ($column->allowNull ? CHtml::checkBox($column->name.'[null]', is_null($row->getAttribute($column->name))) : ''); ?>
				</td>
				<td>
					<?php $this->widget('InputField', array('row' => $row, 'column'=>$column, 'htmlOptions'=>array(
						'onfocus' => '$("#'.$column->name.'_null").attr("checked", "").change();',
						'tabIndex' => $i,
					))); ?>
				</td>
			</tr>
			<?php $i++; ?>
		<?php } ?>
	</tbody>
</table>

<?php echo CHtml::endForm(); ?>