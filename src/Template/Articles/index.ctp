<h1>Articles</h1>
<table>
    <tr>
        <th><?= __('Add') ?></th>
        <th><?= __('Edit') ?></th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

</table>
<form method="POST" action="/change">
    <select name="lang">
        <option value="en">English</option>
        <option value="zh">Chinese</option>
</select>
    <input type="submit" value="submit">
    </form>