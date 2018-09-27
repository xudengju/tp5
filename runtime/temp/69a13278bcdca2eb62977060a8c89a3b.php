<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"H:\phpstudy\PHPTutorial\WWW\tp5.0\public/../application/admin\view\attr\getattr.html";i:1524230024;}*/ ?>
<table width="100%" id="attrTable">
    <tbody>
    <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$vo): if($vo['attr_type'] == 1 and $vo['attr_input_type'] == 1): ?>
    <tr><td class="label"><?php echo $vo['attr_name']; ?></td>
        <td><input type="hidden" name="attr_id_list[]" value="3">
            <input name="attr_value_list[]" type="text" value="" size="40">
            <input type="hidden" name="attr_price_list[]" value="0">
        </td>
    </tr>
    <?php endif; if($vo['attr_type'] == 1 and $vo['attr_input_type'] == 2): ?>
    <tr>
        <td class="label"><?php echo $vo['attr_name']; ?></td>
        <td><input type="hidden" name="attr_id_list[]" value="7">
            <select name="attr_value_list[]">
                <option value="">请选择...</option>
               <?php if($vo['values']): foreach($vo['values'] as $v): ?>
                <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
                <?php endforeach; endif; ?>
            </select>
            <input type="hidden" name="attr_price_list[]" value="0">
        </td>
    </tr>
    <?php endif; if($vo['attr_type'] == 2 and $vo['attr_input_type'] == 2): ?>
    <tr>
        <td class="label">
            <a href="javascript:;" onclick="addSpec(this)">[+]</a><?php echo $vo['attr_name']; ?></td>
        <td><input type="hidden" name="attr_id_list[]" value="1">
            <select name="attr_value_list[]">
                <option value="">请选择...</option>
                <?php if($vo['values']): foreach($vo['values'] as $v): ?>
                <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
                <?php endforeach; endif; ?>
            </select>属性价格<input type="text" name="attr_price_list[]" value="" size="5" maxlength="10">
         </td>
    </tr>
    <?php endif; if($vo['attr_type'] == 2 and $vo['attr_input_type'] == 1): ?>
    <tr>
        <td class="label"><?php echo $vo['attr_name']; ?></td>
        <td><input type="hidden" name="attr_id_list[]" value="9">
            <input name="attr_value_list[]" type="text" value="" size="40">
            <input type="hidden" name="attr_price_list[]" value="0">
        </td>
    </tr>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>