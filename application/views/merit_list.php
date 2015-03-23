<!DOCTYPE html>
<html>
<head>
    <title>Nandalal B.T. College </title>
    <!-- EXAMPLE OF CSS STYLE -->
<style>
    * {font-family:Arial;}
    html{margin: 0;padding: 0}
    body{margin: 0;padding: 0}
    table.table {border:1px #AAA solid;width: 100%;}
    .table td,.table td {padding: 10px;border-bottom: 1px #DDD solid;}
    
</style>
</head>
<body>

<table border="0" align="center">
    <tr>
        <td width="100" align="left">
            <img src="<?php echo base_url()?>public/images/logo_a.png">
        </td>
        <td >
            <h1>Nandalal B.T. College</h1>
            <h3>Merit List (2014-2015)</h3>
        </td>
    </tr>
</table>

<table id="example" class="table" cellspacing="0"  border="0" align="center">
        <tr>
            <td align="left" >#</td>
            <td align="left" >First Name</td>
            <td align="left" >Last Name</td>
            <td align="left" >Date of Birth</td>
            <td align="left" >Gender</td>
            <td align="right" >Score</td>
        </tr>
   
        <tr>
            <td colspan="6" align="left">
                <h3>General Candidate</h3>
            </td>
        </tr>
        <?php foreach($general_list as $k=>$admission){ ?>
        <tr class="red" >
            <td align="left" ><?php echo ($k+1); ?></td>
            <td align="left"><?php echo $admission['first_name']; ?></td>
            <td align="left" ><?php echo $admission['last_name'] ?></td>
            <td align="left" ><?php echo date('d-M Y',strtotime($admission['birth_date']));?></td>
            <td align="left"  style="text-transform:capitalize;"><?php echo $admission['gender']; ?></td>
            <td align="right" ><?php echo $admission['grade'] ?></td>            
        </tr>
        <?php } ?>
        <tr>
            <td colspan="6" align="left">
                <h3>Female Candidate</h3>
            </td>
        </tr>
        <?php foreach($female_list as $k=>$admission){ ?>
        <tr class="green">
            <td align="left" ><?php echo ($k+1); ?></td>
            <td align="left"><?php echo $admission['first_name']; ?></td>
            <td align="left" ><?php echo $admission['last_name'] ?></td>
            <td align="left" ><?php echo date('d-M Y',strtotime($admission['birth_date']));?></td>
            <td align="left"  style="text-transform:capitalize;"><?php echo $admission['gender']; ?></td>
            <td align="right" ><?php echo $admission['grade'] ?></td>            
        </tr>
        <?php } ?>
        <tr>
            <td colspan="6" align="left">
                <h3>SC/ST Candidate</h3>
            </td>
        </tr>
        <?php foreach($stsc_list as $k=>$admission){ ?>
        <tr class="blue">
           <td align="left" ><?php echo ($k+1); ?></td>
            <td align="left"><?php echo $admission['first_name']; ?></td>
            <td align="left" ><?php echo $admission['last_name'] ?></td>
            <td align="left" ><?php echo date('d-M Y',strtotime($admission['birth_date']));?></td>
            <td align="left"  style="text-transform:capitalize;"><?php echo $admission['gender']; ?></td>
            <td align="right" ><?php echo $admission['grade'] ?></td>           
        </tr>
        <?php } ?>
</table>
</body>
</html>   