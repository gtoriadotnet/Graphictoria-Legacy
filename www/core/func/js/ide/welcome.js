const templates = document.getElementsByClassName('gameCard');

function loadFile(file)
{
	window.external.OpenRecentFile(decodeURIComponent(file));
}

function loadTemplate(name)
{
	window.external.StartGame('','','https://assetgame.gtoria.net/game/edit?TemplateName=' + name);
}

function preloadImage(url, templateCard)
{
	var preloadImage = new Image();
	preloadImage.onload = function() {
		templateCard.src = url;
	};
	preloadImage.src = url;
}

for(var i = 0; i < templates.length; i++)
{
	var templateCard = templates[i].children.thumbnail;
	var templateImage = templateCard.dataset.src;
	
	templateCard.removeAttribute('data-src');
	
	preloadImage(templateImage, templateCard);
}