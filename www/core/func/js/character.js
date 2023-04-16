let userName;

function postPose(pose) {
	$("#normal").addClass('disabled'); // yet another hack with these buttons since anchor tags can't be disabled
	$("#walking").addClass('disabled');
	$("#sitting").addClass('disabled');
	$("#overlord").addClass('disabled');
	$("#poseStatus").html("<div class=\"alert alert-warning\">Changing pose...</div>");
	var csrf_token = $('meta[name="csrf-token"]').attr('content');
	var pose = pose;
	$.post('/core/func/api/character/post/changePose.php', {
		csrf: csrf_token,
		pose: pose
	}).done(function(){
		doGenIfName();
		$("#normal").removeClass('disabled');
		$("#walking").removeClass('disabled');
		$("#sitting").removeClass('disabled');
		$("#overlord").removeClass('disabled');
		$("#poseStatus").html("<div class=\"alert alert-success\">Changed pose to " + pose + "</div>");
	});
}

$(document).ready(function() {
	$("#normal").click(function() {
		if ($("#normal").hasClass('disabled') == false) {
			postPose("normal");
		}
	})

	$("#walking").click(function() {
		if ($("#walking").hasClass('disabled') == false) {
			postPose("walking");
		}
	})

	$("#sitting").click(function() {
		if ($("#sitting").hasClass('disabled') == false) {
			postPose("sitting");
		}
	})
	
	$("#overlord").click(function() {
		if ($("#overlord").hasClass('disabled') == false) {
			postPose("overlord");
		}
	})

	$("#regen").click(function() {
		if ($("#regen").is(":disabled") == false) {
			$("#regen").remove();
			$("#poseStatus").html("<div class=\"alert alert-warning\">Regenerating character...</div>");
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			$.post('/core/func/api/character/post/regenCharacter.php', {
				csrf: csrf_token
			}).done(function() {
				$("#poseStatus").html("<div class=\"alert alert-success\">Regenerated character</div>");
			});
		}
	})


	switchTo("hats");

	$("#showHats").click(function() {
		switchTo("hats");
	})

	$("#showHeads").click(function() {
		switchTo("heads");
	})

	$("#showFaces").click(function() {
		switchTo("faces");
	})

	$("#showTshirts").click(function() {
		switchTo("tshirts");
	})

	$("#showShirts").click(function() {
		switchTo("shirts");
	})

	$("#showPants").click(function() {
		switchTo("pants");
	})

	$("#showGear").click(function() {
		switchTo("gear");
	})
});

function doGenIfName()
{
	if(userName == undefined)
	{
		return;
	}
	startGeneration(userName);
}

function startGeneration(uName) {
	//now with a new HACK YUCK YUCKY EWWWWWWW - xlxi
	userName = uName;
	
	var characterElement = document.getElementById('character');
	characterElement.src = 'https://www.gtoria.net/avatar/' + uName + '?time=' + Math.random();
}

function startSpinners()
{
	$('#inventoryItems').html('<div class="center" style="margin-top: 32px; margin-bottom: 32px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');
	$('#wearing').html('<div class="center" style="margin-top: 32px; margin-bottom: 32px;"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>');
}

function switchTo(type) {
	type = type;
	startSpinners();
	$("#inventoryItems").load("/core/func/api/character/getInventory.php?type=" + type);
	$("#wearing").load("/core/func/api/character/getWearing.php?type=" + type);
}

function loadPage(type, page) {
	$("#inventoryItems").load("/core/func/api/character/getInventory.php?type=" + type + "&page=" + page);
}

function wearItem(itemId, type, page) {
	if ($(".wearItem").is(":disabled") == false) {
		$(".wearItem").prop("disabled", true);
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		startSpinners();
		$.post('/core/func/api/character/post/wearItem.php', {
			csrf: csrf_token,
			itemId: itemId,
			type: type
		})
		.done(function() {
			doGenIfName();
			$("#inventoryItems").load("/core/func/api/character/getInventory.php?type=" + type + "&page=" + page);
			$("#wearing").load("/core/func/api/character/getWearing.php?type=" + type);
		});
	}
}

function removeItem(itemId, type, page) {
	if ($(".removeItem").is(":disabled") == false) {
		$(".removeItem").prop("disabled", true);
		var csrf_token = $('meta[name="csrf-token"]').attr('content');
		startSpinners();
		$.post('/core/func/api/character/post/removeItem.php', {
			csrf: csrf_token,
			itemId: itemId
		})
		.done(function() {
			doGenIfName();
			$("#inventoryItems").load("/core/func/api/character/getInventory.php?type=" + type + "&page=" + page);
			$("#wearing").load("/core/func/api/character/getWearing.php?type=" + type);
		});
	}
}
