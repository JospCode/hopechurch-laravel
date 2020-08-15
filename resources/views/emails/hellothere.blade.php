@component('mail::message')
# Obrigado por se cadastrar
 
Welcome to Hope Church. Stay on top of our church services and events.
 
- Fotos e vídeos
- Mensagens
- Fórum
- Estudos bíblicos 

Confirme sua conta:

<div>
	<a href="{{\Request::root()}}/confirmacao/{{$email}}/{{$token}}" style="display: inline-block; color: #FFF; text-decoration: none; border-radius:2px; background:#1865d9; padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:10px;">
		Cofirme sua conta
	</a>
</div>

@component('mail::panel')
Hope Church
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent