<h1>Tests</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
            <a href="/MVC_todo/tests/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new test</a>
            <tr>
                <th>ID</th>
                <th>Test</th>
                <th>Description</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <?php
        foreach ($tests as $test) {
            echo '<tr>';
            echo "<td>" . $test['id'] . "</td>";
            echo "<td>" . $test['title'] . "</td>";
            echo "<td>" . $test['description'] . "</td>";
            echo
            "<td class='text-center'>
                <a class='btn btn-info btn-xs' href='/MVC_todo/tests/edit/" . $test["id"] . "' >
                    <span class='glyphicon glyphicon-edit'></span> Edit
                </a> 
                <a href='/MVC_todo/tests/delete/" . $test["id"] . "' class='btn btn-danger btn-xs'>
                    <span class='glyphicon glyphicon-remove'></span> Del
                </a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>