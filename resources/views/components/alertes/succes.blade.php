@props(["cle"])

@if (session($cle))
<p @class([
    "absolute top-4 left-4 rounded-md p-2",
    "border-2 border-green-300 text-green-300" => $cle == "succes",
    "border-2 border-red-200 text-red-300" => $cle == "erreur"
])>
    {{ session($cle) }}
</p>
@endif
