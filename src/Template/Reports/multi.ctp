<ul>
<li>
<?php
echo $this->Html->link(__('Popup Notification'), [
    'controller' => 'Reports',
    'action' => 'multi',
    'lang' => \Cake\I18n\I18n::locale()
]);
?>
</li>
<li>
<?php
echo $this->Html->link('Push Notification', [
    'controller' => 'Reports',
    'action' => 'multi',
    'lang' => \Cake\I18n\I18n::locale()
]);
?>
</li>
</ul>

