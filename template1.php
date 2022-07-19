<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
<form class="contact-form__form" action="/" method="POST">
        <div class="contact-form__form-inputs">


<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
	$class = 'medicine_name';
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 4){
		$class = 'medicine_name';
		}
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 5){
		$class = 'medicine_company';
		}
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 6){
		$class = 'medicine_email';
		}
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 7){
		$class = 'medicine_phone';
		}
	if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 8){
		$class = 'medicine_message';
		}
	?>

<div class="input contact-form__input"><label class="input__label" for="<?=$class?>">
                <div class="input__label-text"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
</div>
               <?=$arQuestion["HTML_CODE"]?>
                <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
            </label></div>

		
		
	<?
		}
	} //endwhile
	?>



<!--
            <div class="input contact-form__input"><label class="input__label" for="medicine_name">
                <div class="input__label-text">Ваше имя*</div>
                <input class="input__input" type="text" id="medicine_name" name="medicine_name" value=""
                       required="">
                <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
            </label></div>
            <div class="input contact-form__input"><label class="input__label" for="medicine_company">
                <div class="input__label-text">Компания/Должность*</div>
                <input class="input__input" type="text" id="medicine_company" name="medicine_company" value=""
                       required="">
                <div class="input__notification">Поле должно содержать не менее 3-х символов</div>
            </label></div>
            <div class="input contact-form__input"><label class="input__label" for="medicine_email">
                <div class="input__label-text">Email*</div>
                <input class="input__input" type="email" id="medicine_email" name="medicine_email" value=""
                       required="">
                <div class="input__notification">Неверный формат почты</div>
            </label></div>
            <div class="input contact-form__input"><label class="input__label" for="medicine_phone">
                <div class="input__label-text">Номер телефона*</div>
                <input class="input__input" type="tel" id="medicine_phone"
                       data-inputmask="'mask': '+79999999999', 'clearIncomplete': 'true'" maxlength="12"
                       x-autocompletetype="phone-full" name="medicine_phone" value="" required=""></label></div>
        </div>
        <div class="contact-form__form-message">
            <div class="input"><label class="input__label" for="medicine_message">
                <div class="input__label-text">Сообщение</div>
                <textarea class="input__input" type="text" id="medicine_message" name="medicine_message"
                          value=""></textarea>
                <div class="input__notification"></div>
            </label></div>
        </div>
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
            <button class="form-button contact-form__bottom-button" data-success="Отправлено"
                    data-error="Ошибка отправки">
                <div class="form-button__title">Оставить заявку</div>
            </button>
        </div>
    </form>

-->

<?=$arResult["REQUIRED_SIGN"];?> - <?=GetMessage("FORM_REQUIRED_FIELDS")?>
</p>

<div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что
                ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных
                данных&raquo;.
            </div>
<input class="form-button contact-form__bottom-button" data-success="Отправлено"
                    data-error="Ошибка отправки" <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
			<!--	<?if ($arResult["F_RIGHT"] >= 15):?>
				&nbsp;<input type="hidden" name="web_form_apply" value="Y" /><input type="submit" name="web_form_apply" value="<?=GetMessage("FORM_APPLY")?>" />
				<?endif;?>
				&nbsp;<input type="reset" value="<?=GetMessage("FORM_RESET");?>" /> -->
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)