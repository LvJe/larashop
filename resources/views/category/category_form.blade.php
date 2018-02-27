@extends('layouts.xianchang')

@section('content')
<!-- start add new category form -->
<div class="main-div">
  <form action="" method="post" name="theForm" enctype="multipart/form-data">
  <table width="100%" id="general-table">
      <tr>
        <td class="label">分类名称：</td>
        <td>
          <input type='text' name='cat_name' maxlength="20" value='{$cat_info.cat_name|escape:html}' size='27' /> <font color="red">*</font>
        </td>
      </tr>
      <tr>
        <td class="label">上级分类：</td>
        <td>
          <select name="parent_id">
            <option value="0">{$lang.cat_top}</option>
            {$cat_select}
          </select>
        </td>
      </tr>

      <tr id="measure_unit">
        <td class="label">数量单位：</td>
        <td>
          <input type="text" name='measure_unit' value='{$cat_info.measure_unit}' size="12" />
        </td>
      </tr>
      <tr>
        <td class="label">排序：</td>
        <td>
          <input type="text" name='sort_order' {if $cat_info.sort_order}value='{$cat_info.sort_order}'{else} value="50"{/if} size="15" />
        </td>
      </tr>

      <tr>
        <td class="label">是否显示：</td>
        <td>
          <input type="radio" name="is_show" value="1" {if $cat_info.is_show neq 0} checked="true"{/if}/> {$lang.yes}
          <input type="radio" name="is_show" value="0" {if $cat_info.is_show eq 0} checked="true"{/if} /> {$lang.no}
        </td>
      </tr>
      <tr>
        <td class="label">是否显示在导航栏：</td>
        <td>
          <input type="radio" name="show_in_nav" value="1" {if $cat_info.show_in_nav neq 0} checked="true"{/if}/> {$lang.yes}
          <input type="radio" name="show_in_nav" value="0" {if $cat_info.show_in_nav eq 0} checked="true"{/if} /> {$lang.no}
        </td>
      </tr>
      <tr>
        <td class="label">设置为首页推荐：</td>
        <td>
          <input type="checkbox" name="cat_recommend[]" value="1" {if $cat_recommend[1] eq 1} checked="true"{/if}/> {$lang.index_best}
          <input type="checkbox" name="cat_recommend[]" value="2" {if $cat_recommend[2] eq 1} checked="true"{/if} /> {$lang.index_new}
          <input type="checkbox" name="cat_recommend[]" value="3" {if $cat_recommend[3] eq 1} checked="true"{/if} /> {$lang.index_hot}
        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeFilterAttr');" title="{$lang.form_notice}"><img src="images/notice.gif" width="16" height="16" border="0" alt="{$lang.notice_style}"></a>{$lang.filter_attr}:</td>
        <td>
          <table width="100%" id="tbody-attr" align="center">
            <tr>
              <td>   
                   <a href="javascript:;" onclick="addFilterAttr(this)">[+]</a> 
                   <select onChange="changeCat(this)"><option value="0">{$lang.sel_goods_type}</option>{$goods_type_list}</select>&nbsp;&nbsp;
                   <select name="filter_attr[]"><option value="0">{$lang.sel_filter_attr}</option></select><br />                   
              </td>
            </tr>

            <tr>
              <td>

                   <a href="javascript:;">[+]</a>

                   <a href="javascript:;">[-]&nbsp;</a>

                 <select ><option value="0">{$lang.sel_goods_type}</option>{$filter_attr.goods_type_list}</select>&nbsp;&nbsp;
                 <select name="filter_attr[]"><option value="0">{$lang.sel_filter_attr}</option>{html_options options=$filter_attr.option selected=$filter_attr.filter_attr}</select><br />
              </td>
            </tr>

          </table>

          <span class="notice-span" {if $help_open}style="display:block" {else} style="display:none" {/if} id="noticeFilterAttr">{$lang.filter_attr_notic}</span>
        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeGrade');" title="{$lang.form_notice}"><img src="images/notice.gif" width="16" height="16" border="0" alt="{$lang.notice_style}"></a>{$lang.grade}:</td>
        <td>
          <input type="text" name="grade" value="{$cat_info.grade|default:0}" size="40" /> <br />
          <span class="notice-span" {if $help_open}style="display:block" {else} style="display:none" {/if} id="noticeGrade">{$lang.notice_grade}</span>
        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeGoodsSN');" title="{$lang.form_notice}"><img src="images/notice.gif" width="16" height="16" border="0" alt="{$lang.notice_style}"></a>{$lang.cat_style}:</td>
        <td>
          <input type="text" name="style" value="{$cat_info.style|escape}" size="40" /> <br />
          <span class="notice-span" {if $help_open}style="display:block" {else} style="display:none" {/if} id="noticeGoodsSN">{$lang.notice_style}</span>
        </td>
      </tr>
      <tr>
        <td class="label">{$lang.keywords}:</td>
        <td><input type="text" name="keywords" value='{$cat_info.keywords}' size="50">
        </td>
      </tr>

      <tr>
        <td class="label">{$lang.cat_desc}:</td>
        <td>
          <textarea name='cat_desc' rows="6" cols="48">{$cat_info.cat_desc}</textarea>
        </td>
      </tr>
      </table>
      <div class="button-div">
        <input type="submit" value="{$lang.button_submit}" />
        <input type="reset" value="{$lang.button_reset}" />
      </div>
    <input type="hidden" name="act" value="{$form_act}" />
    <input type="hidden" name="old_cat_name" value="{$cat_info.cat_name}" />
    <input type="hidden" name="cat_id" value="{$cat_info.cat_id}" />
  </form>
</div>

@endsection