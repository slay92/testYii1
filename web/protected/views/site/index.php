<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>

<br/><br/><br/><br/><br/>

<table style="width: 50%;" border="1">
    <thead>
        <th>Function Name</th>
        <th>Result</th>
    </thead>
    <tbody>
        <tr>
            <td>Yii::app()->request->baseUrl</td>
            <td><?php echo Yii::app()->request->baseUrl; ?></td>
        </tr>
        <tr>
            <td>Yii::app()->homeUrl</td>
            <td><?php echo Yii::app()->homeUrl; ?></td>
        </tr>
        <tr>
            <td>CHtml::encode(Yii::app()->name)</td>
            <td><?php echo CHtml::encode(Yii::app()->name); ?></td>
        </tr>
        <tr>
            <td>Yii::app()->controller->createUrl("Index")</td>
            <td><?php echo Yii::app()->controller->createUrl("index"); ?></td>
        </tr>
        <tr>
            <td>Yii::app()->user->isGuest</td>
            <td><?php var_dump(Yii::app()->user->isGuest); ?></td>
        </tr>
        <tr>
            <td>Yii::app()->request->hostInfo</td>
            <td><?php echo Yii::app()->request->hostInfo; ?></td>
        </tr>
        <tr>
            <td>Yii::app()->getRequest()->getPathInfo()</td>
            <td><?php echo Yii::app()->getRequest()->getPathInfo(); ?></td>
        </tr>
        <tr>
            <td>Yii::app()->basePath</td>
            <td><?php echo Yii::app()->basePath; ?></td>
        </tr>
        <tr>
            <td>Yii::app()->request->requestUri</td>
            <td><?php echo Yii::app()->request->requestUri; ?></td>
        </tr>
        <tr>
            <td>Yii::app()->request->urlReferrer</td>
            <td><?php echo Yii::app()->request->urlReferrer; ?></td>
        </tr>
    </tbody>
</table>