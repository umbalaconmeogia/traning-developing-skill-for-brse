# Create Equipment management system

1. Create basic application template.
  ```
  composer create-project yiisoft/yii2-app-basic equipment
  ```
  ![composer](./images/equipComposer.png)
2. Access from web browser to confirm that the application work.
  ![initial screen](./images/equipInitialScreen.png)
3. Get familiar with Yii application by edit configuration
  Open *src\equipment\config\web.php*, add `'name' => 'Equipment management',` into *$config*.
  ![Change app name](./images/equipChangeAppName.png)
  Open *src\equipment\views\layouts\main.php*, change *My Company* to <?= Yii::$app->name ?>
  ![Change footer](./images/equipChangeFooter.png)
  Now the application name on the header (menu) and footer has been changed.
  ![Header and footer changed](./images/equipChangeHeaderFooter.png)
