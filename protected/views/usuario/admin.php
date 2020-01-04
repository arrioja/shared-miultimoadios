<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('usuario-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Usuarios</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,                          
	'columns'=>array(
		'id',
		'login',
		'FirstName',
		'LastName',            
		'email',
        'country_code',
//        array('country_code'=>  Country::model()->findByPk($model->country_code)->Name,
//            'label'=>'País'),
        'status',

		/*
		'registration_date',
		
		'sex',
		'cod_rol',
		'wall_id',
		'timestamp',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
