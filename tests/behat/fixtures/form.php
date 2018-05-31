<?php

/**
 * @file
 * HTML test page with pre-defined form elements.
 *
 * We are using PHP version of the page to capture submitted form values in
 * screenshot to ease the debugging process.
 */

?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Test page</title>
</head>
<body>
Test page

<form action="form.php" method="post">
    <div>
        <label for="field1">Field 1</label> <input type="text"
                name="field1"
                id="field1"
                value="<?php print !empty($_POST['field1']) ? $_POST['field1'] : ''; ?>"
        >
    </div>
    <div>
        <label for="field2">Field 2</label> <input type="text"
                name="field2"
                id="field2"
                value="<?php print !empty($_POST['field2']) ? $_POST['field2'] : ''; ?>"
        >
    </div>
    <div>
        <label for="field3">Field 3</label> <input type="text"
                name="field3"
                id="field3"
                value="<?php print !empty($_POST['field3']) ? $_POST['field3'] : ''; ?>"
        >
    </div>

    <div>
        <label for="textarea1">Text area 1</label>
        <textarea name="textarea1" id="textarea1" cols="30" rows="10"><?php print !empty($_POST['textarea1']) ? $_POST['textarea1'] : ''; ?></textarea>
    </div>

    <div>
        <label for="textarea2">Text area 2</label>
        <textarea name="textarea2" id="textarea2" cols="30" rows="10"><?php print !empty($_POST['textarea2']) ? $_POST['textarea2'] : ''; ?></textarea>
    </div>

    <div>
        <label for="textarea3">Text area 3</label>
        <textarea name="textarea3" id="textarea3" cols="30" rows="10"><?php print !empty($_POST['textarea3']) ? $_POST['textarea3'] : ''; ?></textarea>
    </div>

    <div>
        <label for="select1">Select 1</label> <select name="select1"
                id="select1">
            <option value="_">-NONE-</option>
            <option value="1"
            <?php print !empty($_POST['select1']) && $_POST['select1'] === '1' ? 'selected="selected"' : ''; ?>" >Option 1</option>
            <option value="2"
            <?php print !empty($_POST['select1']) && $_POST['select1'] === '2' ? 'selected="selected"' : ''; ?>" >Option 2</option>
            <option value="3"
            <?php print !empty($_POST['select1']) && $_POST['select1'] === '3' ? 'selected="selected"' : ''; ?>" >Option 3</option>
        </select>

        <label for="select2">Select 2</label> <select name="select2"
                id="select2">
            <option value="_">-NONE-</option>
            <option value="1"
            <?php print !empty($_POST['select2']) && $_POST['select2'] === '1' ? 'selected="selected"' : ''; ?>" >Option 1</option>
            <option value="2"
            <?php print !empty($_POST['select2']) && $_POST['select2'] === '2' ? 'selected="selected"' : ''; ?>" >Option 2</option>
            <option value="3"
            <?php print !empty($_POST['select2']) && $_POST['select2'] === '3' ? 'selected="selected"' : ''; ?>" >Option 3</option>
        </select>
    </div>

    <div>
        <label for="radio1">Radio 1</label>

        <label> <input type="radio"
                    name="radio1"
                    id="radio1-1"
                    value="1"
            <?php print !empty($_POST['radio1']) && $_POST['radio1'] === '1' ? 'checked="checked"' : ''; ?>" >
            <span>Radio 1 value 1</span> </label>

        <label> <input type="radio"
                    name="radio1"
                    id="radio1-2"
                    value="2"
            <?php print !empty($_POST['radio1']) && $_POST['radio1'] === '2' ? 'checked="checked"' : ''; ?>" >
            <span>Radio 1 value 2</span> </label> <label> <input type="radio"
                    name="radio1"
                    id="radio1-3"
                    value="3"
            <?php print !empty($_POST['radio1']) && $_POST['radio1'] === '3' ? 'checked="checked"' : ''; ?>" >
            <span>Radio 1 value 3</span> </label>
    </div>

    <div>
        <label for="radio2">Radio 2</label>

        <label> <input type="radio"
                    name="radio2"
                    id="radio2-1"
                    value="1"
            <?php print !empty($_POST['radio2']) && $_POST['radio2'] === '1' ? 'checked="checked"' : ''; ?>" >
            <span>Radio 2 value 1</span> </label>

        <label> <input type="radio"
                    name="radio2"
                    id="radio2-2"
                    value="2"
            <?php print !empty($_POST['radio2']) && $_POST['radio2'] === '2' ? 'checked="checked"' : ''; ?>" >
            <span>Radio 2 value 2</span> </label> <label> <input type="radio"
                    name="radio2"
                    id="radio2-3"
                    value="3"
            <?php print !empty($_POST['radio2']) && $_POST['radio2'] === '3' ? 'checked="checked"' : ''; ?>" >
            <span>Radio 2 value 3</span> </label>
    </div>

    <div>
        <input type="submit" value="Submit"> <input type="reset" value="Reset">
    </div>
</form>
</body>
</html>
