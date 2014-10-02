<?php
/* @var $this CompetencyTopicController */
/* @var $model CompetencyTopic */

$this->breadcrumbs=array(
	'Competency Topics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CompetencyTopic', 'url'=>array('index')),
	array('label'=>'Create CompetencyTopic', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#competency-topic-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Competency Topics</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'competency-topic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'topic_id',
		'topic_name',
		'topic_status',
		'create_date',
		'create_by',
		'update_date',
		/*
		'update_by',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>