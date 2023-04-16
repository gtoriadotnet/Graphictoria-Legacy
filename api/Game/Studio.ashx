%CGacopXx4s4b9X1gsnJ0Ki7YqUd8AAHpI7r5RmfXXJwU+UOzJVzbMc4QyIXV5mhTlg30jihAL7vHp16ODKnHpCckg5Uuftvav9dYxQA+wSfRFFJ5pFrJL7LjOIqMHuhbp4YTnVHtO87MtXVhSwCoxXwKWuj19X4las22iucP4CY=%game:GetService("GuiService").ShowLegacyPlayerList = false
local SetGui = Instance.new("ScreenGui")
local SetMessageFrame = Instance.new("Frame")
local SetText = Instance.new("TextLabel")
SetGui.Name = "SetGui"
SetGui.Parent = game.CoreGui
SetMessageFrame.Name = "SetMessageFrame"
SetMessageFrame.Parent = SetGui
SetMessageFrame.BackgroundColor3 = Color3.new(0, 0, 0)
SetMessageFrame.BackgroundTransparency = 0.5
SetMessageFrame.BorderSizePixel = 0
SetMessageFrame.Position = UDim2.new(0.25, 0, .3850000026, 0)
SetMessageFrame.Size = UDim2.new(0.5, 0, 0.125, 0)
SetMessageFrame.SizeConstraint = Enum.SizeConstraint.RelativeXX

SetText.Name = "SetText"
SetText.Parent = SetMessageFrame
SetText.BackgroundTransparency = 1
SetText.Position = UDim2.new(0, 0, 0.425000012, 0)
SetText.Size = UDim2.new(1, 0, 0.150000006, 0)
SetText.Font = Enum.Font.ArialBold
SetText.FontSize = Enum.FontSize.Size24
SetText.Text = ""
SetText.TextColor3 = Color3.new(1, 1, 1)
SetText.FontSize = "Size24"
SetText.TextWrap = true

function setMessage(text)
	if (text == "") then
		SetMessageFrame.Visible = false
	else
		SetMessageFrame.Visible = true
		SetText.Text = text
	end
end
setMessage("")

local RBXGui = game.CoreGui.RobloxGui
local Popup = Instance.new("Frame", RBXGui)
local Report = Instance.new("TextButton", Popup)
local Cancel = Instance.new("TextButton", Popup)
local Title = Instance.new("TextLabel", Popup)
local Info = Instance.new("TextLabel", Popup)
local DialogFrame = Instance.new("Frame", RBXGui)

RBXGui.BottomLeftControl.Position = UDim2.new(0, 0, 1, -46)
RBXGui.BottomLeftControl.Size = UDim2.new(0, 130, 0, 46)
RBXGui.BottomLeftControl.Image = ""
RBXGui.BottomLeftControl.Exit.BackgroundTransparency = 1
RBXGui.BottomLeftControl.Exit.Position = UDim2.new(0, 2, 0, -2)
RBXGui.BottomLeftControl.Exit.Size = UDim2.new(0, 56, 0, 41)
RBXGui.BottomLeftControl.Exit.Image = "rbxasset://textures/Exitnew.png"
RBXGui.BottomRightControl.BackgroundTransparency = 1
RBXGui.BottomRightControl.Position = UDim2.new(1, -180, 1, -41)
RBXGui.BottomRightControl.Size = UDim2.new(0, 180, 0, 41)
RBXGui.BottomRightControl.Image = ""
RBXGui.BottomRightControl.CameraZoomIn.BackgroundTransparency = 1
RBXGui.BottomRightControl.CameraZoomIn.Position = UDim2.new(1, -29, 1, -55)
RBXGui.BottomRightControl.CameraZoomIn.Size = UDim2.new(0, 25, 0, 25)
RBXGui.BottomRightControl.CameraZoomIn.Image = "rbxasset://textures/CameraZoomIn.png"
RBXGui.BottomRightControl.CameraZoomOut.BackgroundTransparency = 1
RBXGui.BottomRightControl.CameraZoomOut.Position = UDim2.new(1, -29, 1, -29)
RBXGui.BottomRightControl.CameraZoomOut.Size = UDim2.new(0, 25, 0, 25)
RBXGui.BottomRightControl.CameraZoomOut.Image = "rbxasset://textures/CameraZoomOut.png"
RBXGui.BottomRightControl.CameraTiltUp.BackgroundTransparency = 1
RBXGui.BottomRightControl.CameraTiltUp.Position = UDim2.new(1, -56, 1, -55)
RBXGui.BottomRightControl.CameraTiltUp.Size = UDim2.new(0, 25, 0, 25)
RBXGui.BottomRightControl.CameraTiltUp.Image = "rbxasset://textures/CameraTiltUp.png"
RBXGui.BottomRightControl.CameraTiltDown.BackgroundTransparency = 1
RBXGui.BottomRightControl.CameraTiltDown.Position = UDim2.new(1, -56, 1, -29)
RBXGui.BottomRightControl.CameraTiltDown.Size = UDim2.new(0, 25, 0, 25)
RBXGui.BottomRightControl.CameraTiltDown.Image = "rbxasset://textures/CameraTiltDown.png"
RBXGui.BottomRightControl.Screenshot.BackgroundTransparency = 1
RBXGui.BottomRightControl.Screenshot.Position = UDim2.new(1, -118, 1, -40)
RBXGui.BottomRightControl.Screenshot.Size = UDim2.new(0, 30, 0, 30)
RBXGui.BottomRightControl.Screenshot.Image = "rbxasset://textures/Screenshot.png"
RBXGui.BottomRightControl.RecordToggle.BackgroundTransparency = 1
RBXGui.BottomRightControl.RecordToggle.Position = UDim2.new(1, -150, 1, -40)
RBXGui.BottomRightControl.RecordToggle.Size = UDim2.new(0, 30, 0, 30)
RBXGui.BottomRightControl.RecordToggle.Image = "rbxasset://textures/RecordToggle.png"
RBXGui.BottomRightControl.ToggleFullScreen.BackgroundTransparency = 1
RBXGui.BottomRightControl.ToggleFullScreen.Position = UDim2.new(1, -85, 1, -48)
RBXGui.BottomRightControl.ToggleFullScreen.Size = UDim2.new(0, 24, 0, 41)
RBXGui.BottomRightControl.ToggleFullScreen.Image = "rbxasset://textures/ToggleFullScreennew.png"
RBXGui.BottomRightControl.ReportAbuse.Parent = nil
RBXGui.BottomLeftControl.SettingsButton.Parent = nil
RBXGui.BottomLeftControl.TogglePlayMode.Parent = nil
RBXGui.BottomLeftControl.ToolButton.Parent = nil
RBXGui.TopLeftControl.Parent = nil

DialogFrame.Name = "DialogFrame"
DialogFrame.Size = UDim2.new(0.2, 0, 0.06, 0)
DialogFrame.Position = UDim2.new(0, 0, 0.94, 0)
DialogFrame.BackgroundTransparency = 1

Popup.Name = "Popup"
Popup.Position = UDim2.new(0.5, -165, 0.5, -125)
Popup.Size = UDim2.new(0, 330, 0, 250)
Popup.ZIndex = 4
Popup.Style = Enum.FrameStyle.RobloxRound
Popup.Visible = false

Report.Name = "Report"
Report.Position = UDim2.new(0, 20, 0, 170)
Report.Size = UDim2.new(0, 100, 0, 50)
Report.ZIndex = 5
Report.Style = Enum.ButtonStyle.RobloxButton
Report.Font = Enum.Font.ArialBold
Report.FontSize = Enum.FontSize.Size24
Report.Text = "Report"
Report.TextColor3 = Color3.new(0.972549, 0.972549, 0.972549)

Cancel.Name = "Cancel"
Cancel.Position = UDim2.new(1, -120, 0, 170)
Cancel.Size = UDim2.new(0, 100, 0, 50)
Cancel.ZIndex = 5
Cancel.Style = Enum.ButtonStyle.RobloxButton
Cancel.Font = Enum.Font.ArialBold
Cancel.FontSize = Enum.FontSize.Size24
Cancel.Text = "Cancel"
Cancel.TextColor3 = Color3.new(0.972549, 0.972549, 0.972549)

Title.Name = "Title"
Title.BackgroundTransparency = 1
Title.Position = UDim2.new(0, 0, -0.0299999993, 0)
Title.Size = UDim2.new(1, 0, 0.5, 0)
Title.ZIndex = 5
Title.Font = Enum.Font.ArialBold
Title.FontSize = Enum.FontSize.Size36
Title.Text = "Report"
Title.TextColor3 = Color3.new(0.972549, 0.972549, 0.972549)
Title.TextWrap = true

Info.Name = "Info"
Info.BackgroundTransparency = 1
Info.Position = UDim2.new(0, 0, 0.219999999, 0)
Info.Size = UDim2.new(1, 0, 0.5, 0)
Info.ZIndex = 5
Info.Font = Enum.Font.Arial
Info.FontSize = Enum.FontSize.Size18
Info.Text = "Info"
Info.TextColor3 = Color3.new(0.972549, 0.972549, 0.972549)
Info.TextWrap = true

Cancel.MouseButton1Click:connect(function()
	Popup.Visible = not Popup.Visible
end)

RBXGui.BottomRightControl.ToggleFullScreen.MouseLeave:connect(function()
	RBXGui.BottomRightControl.ToggleFullScreen.Active = true
	RBXGui.BottomRightControl.ToggleFullScreen.Image = "rbxasset://textures/ToggleFullScreennew.png"
end)

RBXGui.BottomRightControl.ToggleFullScreen.MouseEnter:connect(function()
	RBXGui.BottomRightControl.ToggleFullScreen.Image = "rbxasset://textures/ToggleFullScreen_dn.png"
	RBXGui.BottomRightControl.ToggleFullScreen.Active = true
end)

RBXGui.BottomLeftControl.Exit.MouseLeave:connect(function()
	RBXGui.BottomLeftControl.Exit.Image = "rbxasset://textures/Exitnew.png"
end)

RBXGui.BottomLeftControl.Exit.MouseEnter:connect(function()
	RBXGui.BottomLeftControl.Exit.Image = "rbxasset://textures/Exit_dn.png"
end)

game:GetService("GuiService").Changed:connect(function()
	game:GetService("GuiService").ShowLegacyPlayerList = false
	game.CoreGui.RobloxGui.PlayerListScript.Parent = nil
	game.CoreGui.RobloxGui.PlayerListTopRightFrame.Parent = nil
	game.CoreGui.RobloxGui.BigPlayerListWindowImposter.Parent = nil
	game.CoreGui.RobloxGui.BigPlayerlist.Parent = nil
end)

coroutine.resume(coroutine.create(function()
	function waitForProperty(instance, name)
	while not instance[name] do
			instance.Changed:wait()
		end
	end

	function waitForChild(instance, name)
		while not instance:FindFirstChild(name) do
			instance.ChildAdded:wait()
		end
	end


	local mainFrame
	local choices = {}
	local lastChoice
	local choiceMap = {}
	local currentConversationDialog
	local currentConversationPartner
	local currentAbortDialogScript

	local KillDialogs = {}

	local tooFarAwayMessage =           "You are too far away to chat!"
	local tooFarAwaySize = 300
	local characterWanderedOffMessage = "Chat ended because you walked away"
	local characterWanderedOffSize = 350
	local conversationTimedOut =        "Chat ended because you did not reply"
	local conversationTimedOutSize = 350

	local player
	local screenGui
	local chatNotificationGui
	local messageDialog
	local reenableDialogScript
	local dialogMap = {}
	local dialogConnections = {}

	local gui = game.CoreGui.RobloxGui


	function currentTone()
		if currentConversationDialog then
			return currentConversationDialog.Tone
		else
			return Enum.DialogTone.Neutral
		end
	end
		

	function createChatNotificationGui()
		chatNotificationGui = Instance.new("BillboardGui")
		chatNotificationGui.Name = "ChatNotificationGui"
		chatNotificationGui.ExtentsOffset = Vector3.new(0,1,0)
		chatNotificationGui.Size = UDim2.new(4, 0, 5.42857122, 0)
		chatNotificationGui.SizeOffset = Vector2.new(0,0)
		chatNotificationGui.StudsOffset = Vector3.new(0.4, 4.3, 0)
		chatNotificationGui.Enabled = true
		chatNotificationGui.Active = true

		local image = Instance.new("ImageLabel")
		image.Name = "Image"
		image.Active = false
		image.BackgroundTransparency = 1
		image.Position = UDim2.new(0,0,0,0)
		image.Size = UDim2.new(1.0,0,1.0,0)
		image.Image = ""
		image.Parent = chatNotificationGui
	   

		local button = Instance.new("ImageButton")
		button.Name = "Button"
		button.AutoButtonColor = false
		button.Position = UDim2.new(0.0879999995, 0, 0.0529999994, 0)
		button.Size = UDim2.new(0.829999983, 0, 0.460000008, 0)
		button.Image = ""
		button.BackgroundTransparency = 1
		button.Parent = image
	end

	function getChatColor(tone)
		if tone == Enum.DialogTone.Neutral then
			return Enum.ChatColor.Blue
		elseif tone == Enum.DialogTone.Friendly then
			return Enum.ChatColor.Green
		elseif tone == Enum.DialogTone.Enemy then
			return Enum.ChatColor.Red
		end
	end

	function styleChoices(tone)
		for i, obj in pairs(choices) do
			resetColor(obj, tone)
		end
		resetColor(lastChoice, tone)
	end

	function styleMainFrame(tone)
		if tone == Enum.DialogTone.Neutral then
			mainFrame.Style = Enum.FrameStyle.ChatBlue
			mainFrame.Tail.Image = "rbxasset://textures/chatBubble_botBlue_tailRight.png"
		elseif tone == Enum.DialogTone.Friendly then
			mainFrame.Style = Enum.FrameStyle.ChatGreen
			mainFrame.Tail.Image = "rbxasset://textures/chatBubble_botGreen_tailRight.png"
		elseif tone == Enum.DialogTone.Enemy then
			mainFrame.Style = Enum.FrameStyle.ChatRed
			mainFrame.Tail.Image = "rbxasset://textures/chatBubble_botRed_tailRight.png"
		end
		
		styleChoices(tone)
	end
	function setChatNotificationTone(gui, purpose, tone)
		if tone == Enum.DialogTone.Neutral then
			gui.Image.Image = "rbxasset://textures/chatBubble_botBlue_notify_bkg.png"
		elseif tone == Enum.DialogTone.Friendly then
			gui.Image.Image = "rbxasset://textures/chatBubble_botGreen_notify_bkg.png"
		elseif tone == Enum.DialogTone.Enemy then
			gui.Image.Image = "rbxasset://textures/chatBubble_botRed_notify_bkg.png"
		end
		if purpose == Enum.DialogPurpose.Quest then
			gui.Image.Button.Image = "rbxasset://textures/chatBubble_bot_notify_bang.png"
		elseif purpose == Enum.DialogPurpose.Help then
			gui.Image.Button.Image = "rbxasset://textures/chatBubble_bot_notify_question.png"
		elseif purpose == Enum.DialogPurpose.Shop then
			gui.Image.Button.Image = "rbxasset://textures/chatBubble_bot_notify_money.png"
		end
	end

	function createMessageDialog()
		messageDialog = Instance.new("Frame");
		messageDialog.Name = "DialogScriptMessage"
		messageDialog.Style = Enum.FrameStyle.RobloxRound
		messageDialog.Visible = false

		local text = Instance.new("TextLabel")
		text.Name = "Text"
		text.Position = UDim2.new(0,0,0,-1)
		text.Size = UDim2.new(1,0,1,0)
		text.FontSize = Enum.FontSize.Size14
		text.BackgroundTransparency = 1
		text.TextColor3 = Color3.new(1,1,1)
		text.Parent = messageDialog
	end

	function showMessage(msg, size)
		messageDialog.Text.Text = msg
		messageDialog.Size = UDim2.new(0,size,0,40)
		messageDialog.Position = UDim2.new(0.5, -size/2, 0.5, -40)
		messageDialog.Visible = true
		wait(2)
		messageDialog.Visible = false
	end

	function variableDelay(str)
		local length = math.min(string.len(str), 100)
		wait(0.75 + ((length/75) * 1.5))
	end

	function resetColor(frame, tone)
		if tone == Enum.DialogTone.Neutral then
			frame.BackgroundColor3 = Color3.new(0/255, 0/255,   179/255) 
			frame.Number.TextColor3 = Color3.new(45/255, 142/255, 245/255) 
		elseif tone == Enum.DialogTone.Friendly then
			frame.BackgroundColor3 = Color3.new(0/255, 77/255,   0/255) 
			frame.Number.TextColor3 = Color3.new(0/255, 190/255, 0/255) 
		elseif tone == Enum.DialogTone.Enemy then
			frame.BackgroundColor3 = Color3.new(140/255, 0/255, 0/255) 
			frame.Number.TextColor3 = Color3.new(255/255,88/255, 79/255) 
		end
	end

	function highlightColor(frame, tone)
		if tone == Enum.DialogTone.Neutral then
			frame.BackgroundColor3 = Color3.new(2/255, 108/255,   255/255) 
			frame.Number.TextColor3 = Color3.new(1, 1, 1) 
		elseif tone == Enum.DialogTone.Friendly then
			frame.BackgroundColor3 = Color3.new(0/255, 128/255,   0/255) 
			frame.Number.TextColor3 = Color3.new(1, 1, 1) 
		elseif tone == Enum.DialogTone.Enemy then
			frame.BackgroundColor3 = Color3.new(204/255, 0/255, 0/255) 
			frame.Number.TextColor3 = Color3.new(1, 1, 1) 
		end
	end

	function wanderDialog()
		mainFrame.Visible = false
		endDialog()
		showMessage(characterWanderedOffMessage, characterWanderedOffSize)
	end

	function timeoutDialog()
		mainFrame.Visible = false
		endDialog()
		showMessage(conversationTimedOut, conversationTimedOutSize)
	end
	function normalEndDialog()
		endDialog()
	end

	function endDialog()
	   if currentAbortDialogScript then
			currentAbortDialogScript:Remove()
			currentAbortDialogScript = nil
		end

		local dialog = currentConversationDialog 
		currentConversationDialog = nil
		if dialog and dialog.InUse then

		end

		for dialog, gui in pairs(dialogMap) do
			if dialog and gui then
				gui.Enabled = not dialog.InUse
			end
		end

		currentConversationPartner = nil
	end

	function sanitizeMessage(msg)
	  if string.len(msg) == 0 then
		 return "..."
	  else
		 return msg
	  end
	end

	function selectChoice(choice)
		renewKillswitch(currentConversationDialog)
		mainFrame.Visible = false
		if choice == lastChoice then
			game.Chat:Chat(game.Players.LocalPlayer.Character, "Goodbye!", getChatColor(currentTone()))
			
			normalEndDialog()
		else 
			local dialogChoice = choiceMap[choice]

			game.Chat:Chat(game.Players.LocalPlayer.Character, sanitizeMessage(dialogChoice.UserDialog), getChatColor(currentTone()))
			wait(1)
			coroutine.resume(coroutine.create(function()
			currentConversationDialog:SignalDialogChoiceSelected(player, dialogChoice)
			end))
			game.Chat:Chat(currentConversationPartner, sanitizeMessage(dialogChoice.ResponseDialog), getChatColor(currentTone()))
		
			variableDelay(dialogChoice.ResponseDialog)
			presentDialogChoices(currentConversationPartner, dialogChoice:GetChildren())
		end 
	end

	function newChoice(numberText)
		local frame = Instance.new("TextButton")
		frame.BackgroundColor3 = Color3.new(0/255, 0/255, 179/255)
		frame.AutoButtonColor = false
		frame.BorderSizePixel = 0
		frame.Text = ""
		frame.MouseEnter:connect(function() highlightColor(frame, currentTone()) end)
		frame.MouseLeave:connect(function() resetColor(frame, currentTone()) end)
		frame.MouseButton1Click:connect(function() selectChoice(frame) end)

		local number = Instance.new("TextLabel")
		number.Name = "Number"
		number.TextColor3 = Color3.new(127/255, 212/255, 255/255)
		number.Text = numberText
		number.FontSize = Enum.FontSize.Size14
		number.BackgroundTransparency = 1
		number.Position = UDim2.new(0,4,0,2)
		number.Size = UDim2.new(0,20,0,24)
		number.TextXAlignment = Enum.TextXAlignment.Left
		number.TextYAlignment = Enum.TextYAlignment.Top
		number.Parent = frame

		local prompt = Instance.new("TextLabel")
		prompt.Name = "UserPrompt"
		prompt.BackgroundTransparency = 1
		prompt.TextColor3 = Color3.new(1,1,1)
		prompt.FontSize = Enum.FontSize.Size14
		prompt.Position = UDim2.new(0,28, 0, 2)
		prompt.Size = UDim2.new(1,-32, 1, -4)
		prompt.TextXAlignment = Enum.TextXAlignment.Left
		prompt.TextYAlignment = Enum.TextYAlignment.Top
		prompt.TextWrap = true
		prompt.Parent = frame

		return frame
	end
	function initialize(parent)
		choices[1] = newChoice("1)")
		choices[2] = newChoice("2)")
		choices[3] = newChoice("3)")
		choices[4] = newChoice("4)")

		lastChoice = newChoice("5)")
		lastChoice.UserPrompt.Text = "Goodbye!"
		lastChoice.Size = UDim2.new(1,0,0,28)

		mainFrame = Instance.new("Frame")
		mainFrame.Name = "UserDialogArea"
		mainFrame.Size = UDim2.new(0, 350, 0, 200)
		mainFrame.Style = Enum.FrameStyle.ChatBlue
		mainFrame.Visible = false
		
		imageLabel = Instance.new("ImageLabel")
		imageLabel.Name = "Tail"
		imageLabel.Size = UDim2.new(0,62,0,53)
		imageLabel.Position = UDim2.new(1,8,0.25)
		imageLabel.Image = "rbxasset://textures/chatBubble_botBlue_tailRight.png"
		imageLabel.BackgroundTransparency = 1
		imageLabel.Parent = mainFrame
		for n, obj in pairs(choices) do
			obj.Parent = mainFrame
		end
		lastChoice.Parent = mainFrame
		mainFrame.Parent = parent
	end

	function presentDialogChoices(talkingPart, dialogChoices)
		if not currentConversationDialog then 
			return 
		end
		currentConversationPartner = talkingPart
		local sortedDialogChoices = {}
		for n, obj in pairs(dialogChoices) do
			if obj:IsA("DialogChoice") then
				table.insert(sortedDialogChoices, obj)
			end
		end
		table.sort(sortedDialogChoices, function(a,b) return a.Name < b.Name end)

		if #sortedDialogChoices == 0 then
			normalEndDialog()
			return
		end
		local pos = 1
	   local yPosition = 0
		choiceMap = {}
		for n, obj in pairs(choices) do
			obj.Visible = false
		end
		for n, obj in pairs(sortedDialogChoices) do
			if pos <= #choices then
				choices[pos].Size = UDim2.new(1, 0, 0, 24*3)
				choices[pos].UserPrompt.Text = obj.UserDialog
				local height = math.ceil(choices[pos].UserPrompt.TextBounds.Y/24)*24

				choices[pos].Position = UDim2.new(0, 0, 0, yPosition)
				choices[pos].Size = UDim2.new(1, 0, 0, height)
				choices[pos].Visible = true
			
				choiceMap[choices[pos]] = obj

				yPosition = yPosition + height
				pos = pos + 1
			end
		end
		lastChoice.Position = UDim2.new(0,0,0,yPosition)	
		lastChoice.Number.Text = pos .. ")"
		mainFrame.Size = UDim2.new(0, 350, 0, yPosition+24+32)
		mainFrame.Position = UDim2.new(0,20,0.0, -mainFrame.Size.Y.Offset-20)
		styleMainFrame(currentTone())
		mainFrame.Visible = true
	end

	function doDialog(dialog)
	coroutine.resume(coroutine.create(function()
	dialog.InUse = true


		currentConversationDialog = dialog
		game.Chat:Chat(dialog.Parent, dialog.InitialPrompt, getChatColor(dialog.Tone))
		variableDelay(dialog.InitialPrompt)
		presentDialogChoices(dialog.Parent, dialog:GetChildren())
		end))
	end


	function renewKillswitch(dialog)
	if KillDialogs[dialog] == nil then
	KillDialogs[dialog] = 0	
	end
	KillDialogs[dialog] = KillDialogs[dialog] + 1
	local CurrentDialogNumber = KillDialogs[dialog] 
	coroutine.resume(coroutine.create(function()
	wait(15)
	if KillDialogs[dialog] == CurrentDialogNumber then
	if dialog:IsA("Dialog") then
	dialog.InUse = false
	end	
	end
	end))
	end

	function checkForLeaveArea()
		while currentConversationDialog do
			if currentConversationDialog.Parent and (player:DistanceFromCharacter(currentConversationDialog.Parent.Position) >= currentConversationDialog.ConversationDistance) then
				wanderDialog()
			end
			wait(1)		
		end
	end

	function startDialog(dialog)
		if dialog.Parent and dialog.Parent:IsA("BasePart") then
			if player:DistanceFromCharacter(dialog.Parent.Position) >= dialog.ConversationDistance then
				showMessage(tooFarAwayMessage, tooFarAwaySize)
				return
			end	
			for dialog, gui in pairs(dialogMap) do
				if dialog and gui then
					gui.Enabled = false
				end
			end
			renewKillswitch(dialog)
			delay(1, checkForLeaveArea)
			doDialog(dialog)
		end
	end

	function removeDialog(dialog)
	   if dialogMap[dialog] then
		  dialogMap[dialog]:Remove()
		  dialogMap[dialog] = nil
	   end
		if dialogConnections[dialog] then
			dialogConnections[dialog]:disconnect()
			dialogConnections[dialog] = nil
		end
	end	

	function addDialog(dialog)
		if dialog.Parent and dialog.Parent:IsA("BasePart") then
			local chatGui = chatNotificationGui:clone()
			chatGui.Enabled = not dialog.InUse		
			chatGui.Adornee = dialog.Parent
			chatGui.Parent = game.CoreGui
			chatGui.Image.Button.MouseButton1Click:connect(function() startDialog(dialog) end)
			setChatNotificationTone(chatGui, dialog.Purpose, dialog.Tone)
		  dialogMap[dialog] = chatGui
		  dialogConnections[dialog] = dialog.Changed:connect(function(prop)
			  if prop == "Parent" and dialog.Parent then 
				  removeDialog(dialog) 
					  addDialog(dialog) 
			  elseif prop == "InUse" then
				  chatGui.Enabled = not currentConversationDialog and not dialog.InUse
					  if dialog == currentConversationDialog then
							timeoutDialog()
					  end
				 elseif prop == "Tone" or prop == "Purpose" then
					  setChatNotificationTone(chatGui, dialog.Purpose, dialog.Tone)
			  end 
			end)
		end
	end

	function fetchScripts()

	end

	function onLoad()
	  waitForProperty(game.Players, "LocalPlayer")
	  player = game.Players.LocalPlayer
	  waitForProperty(player, "Character")
	  fetchScripts()
	  createChatNotificationGui()
	  createMessageDialog()
	  messageDialog.Parent = gui
	  local frame = Instance.new("Frame")
	  frame.Name = "DialogFrame"
	  frame.Position = UDim2.new(0,0,0,0)
	  frame.Size = UDim2.new(0,0,0,0)
	  frame.BackgroundTransparency = 1
	  frame.Parent = gui.DialogFrame
	  initialize(frame)
	  game.CollectionService.ItemAdded:connect(function(obj) if obj:IsA("Dialog") then addDialog(obj) end end)
	  game.CollectionService.ItemRemoved:connect(function(obj) if obj:IsA("Dialog") then removeDialog(obj) end end)
	  for i, obj in pairs(game.CollectionService:GetCollection("Dialog")) do
		if obj:IsA("Dialog") then
		   addDialog(obj)
		end
	  end
	end

	onLoad()
	end))
	
	pcall(function() game:GetService("Players"):SetChatStyle(Enum.ChatStyle.ClassicAndBubble) end)
	local tags = {
		["energycell"] = "http://xdiscuss.net/html/img/badges/2.png"
	}

	coroutine.resume(coroutine.create(function()
	game.CoreGui.PlayerListGUI.Parent = nil
	end))


	coroutine.resume(coroutine.create(function()
	for _,v in pairs(game:GetChildren()) do
	if v.Name == "GuiRoot" then
	coroutine.resume(coroutine.create(function()
	v.ScoreHud.Parent = nil
	end)) end end end))


	local PlayerlistScreenGui = Instance.new("ScreenGui",game.CoreGui)
	PlayerlistScreenGui.Name = "PlayerListGUI"

	local t = {}

	local function ScopedConnect(parentInstance, instance, event, signalFunc, syncFunc, removeFunc)
		local eventConnection = nil
		local tryConnect = function()
			if game:IsAncestorOf(parentInstance) then
				if not eventConnection then
					eventConnection = instance[event]:connect(signalFunc)
					if syncFunc then syncFunc() end
				end
			else
				if eventConnection then
					eventConnection:disconnect()
					if removeFunc then removeFunc() end
				end
			end
		end

		local connection = parentInstance.AncestryChanged:connect(tryConnect)
		
		tryConnect()
		
		return connection
	end

	local function CreateButtons(frame, buttons, yPos, ySize)
		local buttonNum = 1
		local buttonObjs = {}
		for i, obj in ipairs(buttons) do 
			local button = Instance.new("TextButton")
			button.Name = "Button" .. buttonNum
			button.Font = Enum.Font.Arial
			button.FontSize = Enum.FontSize.Size18
			button.AutoButtonColor = true
			button.Style = Enum.ButtonStyle.RobloxButtonDefault 
			button.Text = obj.Text
			button.TextColor3 = Color3.new(1,1,1)
			button.MouseButton1Click:connect(obj.Function)
			button.Parent = frame
			buttonObjs[buttonNum] = button

			buttonNum = buttonNum + 1
		end
		local numButtons = buttonNum-1

		if numButtons == 1 then
			frame.Button1.Position = UDim2.new(0.35, 0, yPos.Scale, yPos.Offset)
			frame.Button1.Size = UDim2.new(.4,0,ySize.Scale, ySize.Offset)
		elseif numButtons == 2 then
			frame.Button1.Position = UDim2.new(0.1, 0, yPos.Scale, yPos.Offset)
			frame.Button1.Size = UDim2.new(.8/3,0, ySize.Scale, ySize.Offset)

			frame.Button2.Position = UDim2.new(0.55, 0, yPos.Scale, yPos.Offset)
			frame.Button2.Size = UDim2.new(.35,0, ySize.Scale, ySize.Offset)
		elseif numButtons >= 3 then
			local spacing = .1 / numButtons
			local buttonSize = .9 / numButtons

			buttonNum = 1
			while buttonNum <= numButtons do
				buttonObjs[buttonNum].Position = UDim2.new(spacing*buttonNum + (buttonNum-1) * buttonSize, 0, yPos.Scale, yPos.Offset)
				buttonObjs[buttonNum].Size = UDim2.new(buttonSize, 0, ySize.Scale, ySize.Offset)
				buttonNum = buttonNum + 1
			end
		end
	end

	local function setSliderPos(newAbsPosX,slider,sliderPosition,bar,steps)

		local newStep = steps - 1 
		
		local relativePosX = math.min(1, math.max(0, (newAbsPosX - bar.AbsolutePosition.X) / bar.AbsoluteSize.X ) )
		local wholeNum, remainder = math.modf(relativePosX * newStep)
		if remainder > 0.5 then
			wholeNum = wholeNum + 1
		end
		relativePosX = wholeNum/newStep

		local result = math.ceil(relativePosX * newStep)
		if sliderPosition.Value ~= (result + 1) then
			sliderPosition.Value = result + 1
			
			if relativePosX == 1 then
				slider.Position = UDim2.new(1,-slider.AbsoluteSize.X,slider.Position.Y.Scale,slider.Position.Y.Offset)
			else
				slider.Position = UDim2.new(relativePosX,0,slider.Position.Y.Scale,slider.Position.Y.Offset)
			end
		end
		
	end

	local function cancelSlide(areaSoak)
		areaSoak.Visible = false
		if areaSoakMouseMoveCon then areaSoakMouseMoveCon:disconnect() end
	end

	t.CreateStyledMessageDialog = function(title, message, style, buttons)
		local frame = Instance.new("Frame")
		frame.Size = UDim2.new(0.5, 0, 0, 165)
		frame.Position = UDim2.new(0.25, 0, 0.5, -72.5)
		frame.Name = "MessageDialog"
		frame.Active = true
		frame.Style = Enum.FrameStyle.RobloxRound	
		
		local styleImage = Instance.new("ImageLabel")
		styleImage.Name = "StyleImage"
		styleImage.BackgroundTransparency = 1
		styleImage.Position = UDim2.new(0,5,0,15)
		if style == "error" or style == "Error" then
			styleImage.Size = UDim2.new(0, 71, 0, 71)
			styleImage.Image = "http://www.roblox.com/asset?id=42565285"
		elseif style == "notify" or style == "Notify" then
			styleImage.Size = UDim2.new(0, 71, 0, 71)
			styleImage.Image = "http://www.roblox.com/asset?id=42604978"
		elseif style == "confirm" or style == "Confirm" then
			styleImage.Size = UDim2.new(0, 74, 0, 76)
			styleImage.Image = "http://www.roblox.com/asset?id=42557901"
		else
			return t.CreateMessageDialog(title,message,buttons)
		end
		styleImage.Parent = frame
		
		local titleLabel = Instance.new("TextLabel")
		titleLabel.Name = "Title"
		titleLabel.Text = title
		titleLabel.BackgroundTransparency = 1
		titleLabel.TextColor3 = Color3.new(221/255,221/255,221/255)
		titleLabel.Position = UDim2.new(0, 80, 0, 0)
		titleLabel.Size = UDim2.new(1, -80, 0, 40)
		titleLabel.Font = Enum.Font.ArialBold
		titleLabel.FontSize = Enum.FontSize.Size36
		titleLabel.TextXAlignment = Enum.TextXAlignment.Center
		titleLabel.TextYAlignment = Enum.TextYAlignment.Center
		titleLabel.Parent = frame

		local messageLabel = Instance.new("TextLabel")
		messageLabel.Name = "Message"
		messageLabel.Text = message
		messageLabel.TextColor3 = Color3.new(221/255,221/255,221/255)
		messageLabel.Position = UDim2.new(0.025, 80, 0, 45)
		messageLabel.Size = UDim2.new(0.95, -80, 0, 55)
		messageLabel.BackgroundTransparency = 1
		messageLabel.Font = Enum.Font.Arial
		messageLabel.FontSize = Enum.FontSize.Size18
		messageLabel.TextWrap = true
		messageLabel.TextXAlignment = Enum.TextXAlignment.Left
		messageLabel.TextYAlignment = Enum.TextYAlignment.Top
		messageLabel.Parent = frame

		CreateButtons(frame, buttons, UDim.new(0, 105), UDim.new(0, 40) )

		return frame
	end

	t.CreateMessageDialog = function(title, message, buttons)
		local frame = Instance.new("Frame")
		frame.Size = UDim2.new(0.5, 0, 0.5, 0)
		frame.Position = UDim2.new(0.25, 0, 0.25, 0)
		frame.Name = "MessageDialog"
		frame.Active = true
		frame.Style = Enum.FrameStyle.RobloxRound

		local titleLabel = Instance.new("TextLabel")
		titleLabel.Name = "Title"
		titleLabel.Text = title
		titleLabel.BackgroundTransparency = 1
		titleLabel.TextColor3 = Color3.new(221/255,221/255,221/255)
		titleLabel.Position = UDim2.new(0, 0, 0, 0)
		titleLabel.Size = UDim2.new(1, 0, 0.15, 0)
		titleLabel.Font = Enum.Font.ArialBold
		titleLabel.FontSize = Enum.FontSize.Size36
		titleLabel.TextXAlignment = Enum.TextXAlignment.Center
		titleLabel.TextYAlignment = Enum.TextYAlignment.Center
		titleLabel.Parent = frame

		local messageLabel = Instance.new("TextLabel")
		messageLabel.Name = "Message"
		messageLabel.Text = message
		messageLabel.TextColor3 = Color3.new(221/255,221/255,221/255)
		messageLabel.Position = UDim2.new(0.025, 0, 0.175, 0)
		messageLabel.Size = UDim2.new(0.95, 0, .55, 0)
		messageLabel.BackgroundTransparency = 1
		messageLabel.Font = Enum.Font.Arial
		messageLabel.FontSize = Enum.FontSize.Size18
		messageLabel.TextWrap = true
		messageLabel.TextXAlignment = Enum.TextXAlignment.Left
		messageLabel.TextYAlignment = Enum.TextYAlignment.Top
		messageLabel.Parent = frame

		CreateButtons(frame, buttons, UDim.new(0.8,0), UDim.new(0.15, 0))

		return frame
	end

	t.CreateDropDownMenu = function(items, onSelect, forRoblox)
		local width = UDim.new(0, 100)
		local height = UDim.new(0, 32)

		local xPos = 0.055
		local frame = Instance.new("Frame")
		frame.Name = "DropDownMenu"
		frame.BackgroundTransparency = 1
		frame.Size = UDim2.new(width, height)

		local dropDownMenu = Instance.new("TextButton")
		dropDownMenu.Name = "DropDownMenuButton"
		dropDownMenu.TextWrap = true
		dropDownMenu.TextColor3 = Color3.new(1,1,1)
		dropDownMenu.Text = "Choose One"
		dropDownMenu.Font = Enum.Font.ArialBold
		dropDownMenu.FontSize = Enum.FontSize.Size18
		dropDownMenu.TextXAlignment = Enum.TextXAlignment.Left
		dropDownMenu.TextYAlignment = Enum.TextYAlignment.Center
		dropDownMenu.BackgroundTransparency = 1
		dropDownMenu.AutoButtonColor = true
		dropDownMenu.Style = Enum.ButtonStyle.RobloxButton
		dropDownMenu.Size = UDim2.new(1,0,1,0)
		dropDownMenu.Parent = frame
		dropDownMenu.ZIndex = 2

		local dropDownIcon = Instance.new("ImageLabel")
		dropDownIcon.Name = "Icon"
		dropDownIcon.Active = false
		dropDownIcon.Image = "http://www.roblox.com/asset/?id=45732894"
		dropDownIcon.BackgroundTransparency = 1
		dropDownIcon.Size = UDim2.new(0,11,0,6)
		dropDownIcon.Position = UDim2.new(1,-11,0.5, -2)
		dropDownIcon.Parent = dropDownMenu
		dropDownIcon.ZIndex = 2
		
		local itemCount = #items
		local dropDownItemCount = #items
		local useScrollButtons = false
		if dropDownItemCount > 6 then
			useScrollButtons = true
			dropDownItemCount = 6
		end
		
		local droppedDownMenu = Instance.new("TextButton")
		droppedDownMenu.Name = "List"
		droppedDownMenu.Text = ""
		droppedDownMenu.BackgroundTransparency = 1
		droppedDownMenu.Style = Enum.ButtonStyle.RobloxButton
		droppedDownMenu.Visible = false
		droppedDownMenu.Active = true
		droppedDownMenu.Position = UDim2.new(0,0,0,0)
		droppedDownMenu.Size = UDim2.new(1,0, (1 + dropDownItemCount)*.8, 0)
		droppedDownMenu.Parent = frame
		droppedDownMenu.ZIndex = 2

		local choiceButton = Instance.new("TextButton")
		choiceButton.Name = "ChoiceButton"
		choiceButton.BackgroundTransparency = 1
		choiceButton.BorderSizePixel = 0
		choiceButton.Text = "ReplaceMe"
		choiceButton.TextColor3 = Color3.new(1,1,1)
		choiceButton.TextXAlignment = Enum.TextXAlignment.Left
		choiceButton.TextYAlignment = Enum.TextYAlignment.Center
		choiceButton.BackgroundColor3 = Color3.new(1, 1, 1)
		choiceButton.Font = Enum.Font.Arial
		choiceButton.FontSize = Enum.FontSize.Size18
		if useScrollButtons then
			choiceButton.Size = UDim2.new(1,-13, .8/((dropDownItemCount + 1)*.8),0) 
		else
			choiceButton.Size = UDim2.new(1, 0, .8/((dropDownItemCount + 1)*.8),0) 
		end
		choiceButton.TextWrap = true
		choiceButton.ZIndex = 2

		local dropDownSelected = false

		local scrollUpButton 
		local scrollDownButton
		local scrollMouseCount = 0

		local setZIndex = function(baseZIndex)
			droppedDownMenu.ZIndex = baseZIndex +1
			if scrollUpButton then
				scrollUpButton.ZIndex = baseZIndex + 3
			end
			if scrollDownButton then
				scrollDownButton.ZIndex = baseZIndex + 3
			end
			
			local children = droppedDownMenu:GetChildren()
			if children then
				for i, child in ipairs(children) do
					if child.Name == "ChoiceButton" then
						child.ZIndex = baseZIndex + 2
					elseif child.Name == "ClickCaptureButton" then
						child.ZIndex = baseZIndex
					end
				end
			end
		end

		local scrollBarPosition = 1
		local updateScroll = function()
			if scrollUpButton then
				scrollUpButton.Active = scrollBarPosition > 1 
			end
			if scrollDownButton then
				scrollDownButton.Active = scrollBarPosition + dropDownItemCount <= itemCount 
			end

			local children = droppedDownMenu:GetChildren()
			if not children then return end

			local childNum = 1			
			for i, obj in ipairs(children) do
				if obj.Name == "ChoiceButton" then
					if childNum < scrollBarPosition or childNum >= scrollBarPosition + dropDownItemCount then
						obj.Visible = false
					else
						obj.Position = UDim2.new(0,0,((childNum-scrollBarPosition+1)*.8)/((dropDownItemCount+1)*.8),0)
						obj.Visible = true
					end
					obj.TextColor3 = Color3.new(1,1,1)
					obj.BackgroundTransparency = 1

					childNum = childNum + 1
				end
			end
		end
		local toggleVisibility = function()
			dropDownSelected = not dropDownSelected

			dropDownMenu.Visible = not dropDownSelected
			droppedDownMenu.Visible = dropDownSelected
			if dropDownSelected then
				setZIndex(4)
			else
				setZIndex(2)
			end
			if useScrollButtons then
				updateScroll()
			end
		end
		droppedDownMenu.MouseButton1Click:connect(toggleVisibility)

		local updateSelection = function(text)
			local foundItem = false
			local children = droppedDownMenu:GetChildren()
			local childNum = 1
			if children then
				for i, obj in ipairs(children) do
					if obj.Name == "ChoiceButton" then
						if obj.Text == text then
							obj.Font = Enum.Font.ArialBold
							foundItem = true			
							scrollBarPosition = childNum
						else
							obj.Font = Enum.Font.Arial
						end
						childNum = childNum + 1
					end
				end
			end
			if not text then
				dropDownMenu.Text = "Choose One"
				scrollBarPosition = 1
			else
				if not foundItem then
					error("Invalid Selection Update -- " .. text)
				end

				if scrollBarPosition + dropDownItemCount > itemCount + 1 then
					scrollBarPosition = itemCount - dropDownItemCount + 1
				end

				dropDownMenu.Text = text
			end
		end
		
		local function scrollDown()
			if scrollBarPosition + dropDownItemCount <= itemCount then
				scrollBarPosition = scrollBarPosition + 1
				updateScroll()
				return true
			end
			return false
		end
		local function scrollUp()
			if scrollBarPosition > 1 then
				scrollBarPosition = scrollBarPosition - 1
				updateScroll()
				return true
			end
			return false
		end
		
		if useScrollButtons then
			scrollUpButton = Instance.new("ImageButton")
			scrollUpButton.Name = "ScrollUpButton"
			scrollUpButton.BackgroundTransparency = 1
			scrollUpButton.Image = "rbxasset://textures/ui/scrollbuttonUp.png"
			scrollUpButton.Size = UDim2.new(0,17,0,17) 
			scrollUpButton.Position = UDim2.new(1,-11,(1*.8)/((dropDownItemCount+1)*.8),0)
			scrollUpButton.MouseButton1Click:connect(
				function()
					scrollMouseCount = scrollMouseCount + 1
				end)
			scrollUpButton.MouseLeave:connect(
				function()
					scrollMouseCount = scrollMouseCount + 1
				end)
			scrollUpButton.MouseButton1Down:connect(
				function()
					scrollMouseCount = scrollMouseCount + 1
		
					scrollUp()
					local val = scrollMouseCount
					wait(0.5)
					while val == scrollMouseCount do
						if scrollUp() == false then
							break
						end
						wait(0.1)
					end				
				end)

			scrollUpButton.Parent = droppedDownMenu

			scrollDownButton = Instance.new("ImageButton")
			scrollDownButton.Name = "ScrollDownButton"
			scrollDownButton.BackgroundTransparency = 1
			scrollDownButton.Image = "rbxasset://textures/ui/scrollbuttonDown.png"
			scrollDownButton.Size = UDim2.new(0,17,0,17) 
			scrollDownButton.Position = UDim2.new(1,-11,1,-11)
			scrollDownButton.Parent = droppedDownMenu
			scrollDownButton.MouseButton1Click:connect(
				function()
					scrollMouseCount = scrollMouseCount + 1
				end)
			scrollDownButton.MouseLeave:connect(
				function()
					scrollMouseCount = scrollMouseCount + 1
				end)
			scrollDownButton.MouseButton1Down:connect(
				function()
					scrollMouseCount = scrollMouseCount + 1

					scrollDown()
					local val = scrollMouseCount
					wait(0.5)
					while val == scrollMouseCount do
						if scrollDown() == false then
							break
						end
						wait(0.1)
					end				
				end)	

			local scrollbar = Instance.new("ImageLabel")
			scrollbar.Name = "ScrollBar"
			scrollbar.Image = "rbxasset://textures/ui/scrollbar.png"
			scrollbar.BackgroundTransparency = 1
			scrollbar.Size = UDim2.new(0, 18, (dropDownItemCount*.8)/((dropDownItemCount+1)*.8), -(17) - 11 - 4)
			scrollbar.Position = UDim2.new(1,-11,(1*.8)/((dropDownItemCount+1)*.8),17+2)
			scrollbar.Parent = droppedDownMenu
		end

		for i,item in ipairs(items) do
			local button = choiceButton:clone()
			if forRoblox then
			end		
			button.Text = item
			button.Parent = droppedDownMenu
			button.MouseButton1Click:connect(function()
				button.TextColor3 = Color3.new(1,1,1)
				button.BackgroundTransparency = 1

				updateSelection(item)
				onSelect(item)

				toggleVisibility()
			end)
			button.Visible = false
			button.MouseEnter:connect(function()
				button.TextColor3 = Color3.new(0,0,0)
				button.BackgroundTransparency = 0
				button.Visible = false
			end)

			button.MouseLeave:connect(function()
				button.TextColor3 = Color3.new(1,1,1)
				button.BackgroundTransparency = 1
				button.Visible = false
			end)
		end
		updateScroll()

		local bigFakeButton = Instance.new("TextButton")
		bigFakeButton.BackgroundTransparency = 1
		bigFakeButton.Name = "ClickCaptureButton"
		bigFakeButton.Size = UDim2.new(0, 4000, 0, 3000)
		bigFakeButton.Position = UDim2.new(0, -2000, 0, -1500)
		bigFakeButton.ZIndex = 1
		bigFakeButton.Text = ""
		bigFakeButton.Parent = droppedDownMenu
		bigFakeButton.MouseButton1Click:connect(toggleVisibility)

		dropDownMenu.MouseButton1Click:connect(toggleVisibility)
		return frame, updateSelection
	end

	t.CreatePropertyDropDownMenu = function(instance, property, enum)

		local items = enum:GetEnumItems()
		local names = {}
		local nameToItem = {}
		for i,obj in ipairs(items) do
			names[i] = obj.Name
			nameToItem[obj.Name] = obj
		end

		local frame
		local updateSelection
		frame, updateSelection = t.CreateDropDownMenu(names, function(text) instance[property] = nameToItem[text] end)

		ScopedConnect(frame, instance, "Changed", 
			function(prop)
				if prop == property then
					updateSelection(instance[property].Name)
				end
			end,
			function()
				updateSelection(instance[property].Name)
			end)

		return frame
	end

	t.GetFontHeight = function(font, fontSize)
		if font == nil or fontSize == nil then
			error("Font and FontSize must be non-nil")
		end

		if font == Enum.Font.Legacy then
			if fontSize == Enum.FontSize.Size8 then
				return 12
			elseif fontSize == Enum.FontSize.Size9 then
				return 14
			elseif fontSize == Enum.FontSize.Size10 then
				return 15
			elseif fontSize == Enum.FontSize.Size11 then
				return 17
			elseif fontSize == Enum.FontSize.Size12 then
				return 18
			elseif fontSize == Enum.FontSize.Size14 then
				return 21
			elseif fontSize == Enum.FontSize.Size18 then
				return 27
			elseif fontSize == Enum.FontSize.Size24 then
				return 36
			elseif fontSize == Enum.FontSize.Size36 then
				return 54
			elseif fontSize == Enum.FontSize.Size48 then
				return 72
			else
				error("Unknown FontSize")
			end
		elseif font == Enum.Font.Arial or font == Enum.Font.ArialBold then
			if fontSize == Enum.FontSize.Size8 then
				return 8
			elseif fontSize == Enum.FontSize.Size9 then
				return 9
			elseif fontSize == Enum.FontSize.Size10 then
				return 10
			elseif fontSize == Enum.FontSize.Size11 then
				return 11
			elseif fontSize == Enum.FontSize.Size12 then
				return 12
			elseif fontSize == Enum.FontSize.Size14 then
				return 14
			elseif fontSize == Enum.FontSize.Size18 then
				return 18
			elseif fontSize == Enum.FontSize.Size24 then
				return 24
			elseif fontSize == Enum.FontSize.Size36 then
				return 36
			elseif fontSize == Enum.FontSize.Size48 then
				return 48
			else
				error("Unknown FontSize")
			end
		else
			error("Unknown Font " .. font)
		end
	end

	local function layoutGuiObjectsHelper(frame, guiObjects, settingsTable)
		local totalPixels = frame.AbsoluteSize.Y
		local pixelsRemaining = frame.AbsoluteSize.Y
		for i, child in ipairs(guiObjects) do
			if child:IsA("TextLabel") or child:IsA("TextButton") then
				local isLabel = child:IsA("TextLabel")
				if isLabel then
					pixelsRemaining = pixelsRemaining - settingsTable["TextLabelPositionPadY"]
				else
					pixelsRemaining = pixelsRemaining - settingsTable["TextButtonPositionPadY"]
				end
				child.Position = UDim2.new(child.Position.X.Scale, child.Position.X.Offset, 0, totalPixels - pixelsRemaining)
				child.Size = UDim2.new(child.Size.X.Scale, child.Size.X.Offset, 0, pixelsRemaining)

				if child.TextFits and child.TextBounds.Y < pixelsRemaining then
					child.Visible = true
					if isLabel then
						child.Size = UDim2.new(child.Size.X.Scale, child.Size.X.Offset, 0, child.TextBounds.Y + settingsTable["TextLabelSizePadY"])
					else 
						child.Size = UDim2.new(child.Size.X.Scale, child.Size.X.Offset, 0, child.TextBounds.Y + settingsTable["TextButtonSizePadY"])
					end

					while not child.TextFits do
						child.Size = UDim2.new(child.Size.X.Scale, child.Size.X.Offset, 0, child.AbsoluteSize.Y + 1)
					end
					pixelsRemaining = pixelsRemaining - child.AbsoluteSize.Y		

					if isLabel then
						pixelsRemaining = pixelsRemaining - settingsTable["TextLabelPositionPadY"]
					else
						pixelsRemaining = pixelsRemaining - settingsTable["TextButtonPositionPadY"]
					end
				else
					child.Visible = false
					pixelsRemaining = -1
				end			

			else
				child.Position = UDim2.new(child.Position.X.Scale, child.Position.X.Offset, 0, totalPixels - pixelsRemaining)
				pixelsRemaining = pixelsRemaining - child.AbsoluteSize.Y
				child.Visible = (pixelsRemaining >= 0)
			end
		end
	end

	t.LayoutGuiObjects = function(frame, guiObjects, settingsTable)
		if not frame:IsA("GuiObject") then
			error("Frame must be a GuiObject")
		end
		for i, child in ipairs(guiObjects) do
			if not child:IsA("GuiObject") then
				error("All elements that are layed out must be of type GuiObject")
			end
		end

		if not settingsTable then
			settingsTable = {}
		end

		if not settingsTable["TextLabelSizePadY"] then
			settingsTable["TextLabelSizePadY"] = 0
		end
		if not settingsTable["TextLabelPositionPadY"] then
			settingsTable["TextLabelPositionPadY"] = 0
		end
		if not settingsTable["TextButtonSizePadY"] then
			settingsTable["TextButtonSizePadY"] = 12
		end
		if not settingsTable["TextButtonPositionPadY"] then
			settingsTable["TextButtonPositionPadY"] = 2
		end

		local wrapperFrame = Instance.new("Frame")
		wrapperFrame.Name = "WrapperFrame"
		wrapperFrame.BackgroundTransparency = 1
		wrapperFrame.Size = UDim2.new(1,0,1,0)
		wrapperFrame.Parent = frame

		for i, child in ipairs(guiObjects) do
			child.Parent = wrapperFrame
		end

		local recalculate = function()
			wait()
			layoutGuiObjectsHelper(wrapperFrame, guiObjects, settingsTable)
		end
		
		frame.Changed:connect(
			function(prop)
				if prop == "AbsoluteSize" then
					recalculate()
				end
			end)
		frame.AncestryChanged:connect(recalculate)

		layoutGuiObjectsHelper(wrapperFrame, guiObjects, settingsTable)
	end


	t.CreateSlider = function(steps,width,position)
		local sliderGui = Instance.new("Frame")
		sliderGui.Size = UDim2.new(1,0,1,0)
		sliderGui.BackgroundTransparency = 1
		sliderGui.Name = "SliderGui"
		
		local areaSoak = Instance.new("TextButton")
		areaSoak.Name = "AreaSoak"
		areaSoak.Text = ""
		areaSoak.BackgroundTransparency = 1
		areaSoak.Active = false
		areaSoak.Size = UDim2.new(1,0,1,0)
		areaSoak.Visible = false
		areaSoak.ZIndex = 4
		areaSoak.Parent = sliderGui
		
		local sliderPosition = Instance.new("IntValue")
		sliderPosition.Name = "SliderPosition"
		sliderPosition.Value = 0
		sliderPosition.Parent = sliderGui
		
		local id = math.random(1,100)
		
		local bar = Instance.new("Frame")
		bar.Name = "Bar"
		bar.BackgroundColor3 = Color3.new(0,0,0)
		if type(width) == "number" then
			bar.Size = UDim2.new(0,width,0,5)
		else
			bar.Size = UDim2.new(0,200,0,5)
		end
		bar.BorderColor3 = Color3.new(95/255,95/255,95/255)
		bar.ZIndex = 2
		bar.Parent = sliderGui
		
		if position["X"] and position["X"]["Scale"] and position["X"]["Offset"] and position["Y"] and position["Y"]["Scale"] and position["Y"]["Offset"] then
			bar.Position = position
		end
		
		local slider = Instance.new("ImageButton")
		slider.Name = "Slider"
		slider.BackgroundTransparency = 1
		slider.Image = "rbxasset://textures/ui/Slider.png"
		slider.Position = UDim2.new(0,0,0.5,-10)
		slider.Size = UDim2.new(0,20,0,20)
		slider.ZIndex = 3
		slider.Parent = bar
		
		local areaSoakMouseMoveCon = nil
		
		areaSoak.MouseLeave:connect(function()
			if areaSoak.Visible then
				cancelSlide(areaSoak)
			end
		end)
		areaSoak.MouseButton1Up:connect(function()
			if areaSoak.Visible then
				cancelSlide(areaSoak)
			end
		end)
		
		slider.MouseButton1Down:connect(function()
			areaSoak.Visible = true
			if areaSoakMouseMoveCon then areaSoakMouseMoveCon:disconnect() end
			areaSoakMouseMoveCon = areaSoak.MouseMoved:connect(function(x,y)
				setSliderPos(x,slider,sliderPosition,bar,steps)
			end)
		end)
		
		slider.MouseButton1Up:connect(function() cancelSlide(areaSoak) end)
		
		sliderPosition.Changed:connect(function(prop)
			local relativePosX = (sliderPosition.Value - 1) / steps
			slider.Position = UDim2.new(relativePosX,0,slider.Position.Y.Scale,slider.Position.Y.Offset)
		end)
		
		return sliderGui, sliderPosition

	end


	t.CreateScrollingFrame = function(orderList,scrollStyle)
		local frame = Instance.new("Frame")
		frame.Name = "ScrollingFrame"
		frame.BackgroundTransparency = 1
		frame.Size = UDim2.new(1,0,1,0)
		
		local scrollUpButton = Instance.new("ImageButton")
		scrollUpButton.Name = "ScrollUpButton"
		scrollUpButton.BackgroundTransparency = 1
		scrollUpButton.Image = "rbxasset://textures/ui/scrollbuttonUp.png"
		scrollUpButton.Size = UDim2.new(0,17,0,17) 

		
		local scrollDownButton = Instance.new("ImageButton")
		scrollDownButton.Name = "ScrollDownButton"
		scrollDownButton.BackgroundTransparency = 1
		scrollDownButton.Image = "rbxasset://textures/ui/scrollbuttonDown.png"
		scrollDownButton.Size = UDim2.new(0,17,0,17) 

		local style = "simple"
		if scrollStyle and tostring(scrollStyle) then
			style = scrollStyle
		end
		
		local scrollPosition = 1
		local rowSize = 1
		
		local layoutGridScrollBar = function()
			local guiObjects = {}
			if orderList then
				for i, child in ipairs(orderList) do
					if child.Parent == frame then
						table.insert(guiObjects, child)
					end
				end
			else
				local children = frame:GetChildren()
				if children then
					for i, child in ipairs(children) do 
						if child:IsA("GuiObject") then
							table.insert(guiObjects, child)
						end
					end
				end
			end
			if #guiObjects == 0 then
				scrollUpButton.Active = false
				scrollDownButton.Active = false
				scrollPosition = 1
				return
			end

			if scrollPosition > #guiObjects then
				scrollPosition = #guiObjects
			end
			
			local totalPixelsY = frame.AbsoluteSize.Y
			local pixelsRemainingY = frame.AbsoluteSize.Y
			
			local totalPixelsX  = frame.AbsoluteSize.X
			
			local xCounter = 0
			local rowSizeCounter = 0
			local setRowSize = true

			local pixelsBelowScrollbar = 0
			local pos = #guiObjects
			while pixelsBelowScrollbar < totalPixelsY and pos >= 1 do
				if pos >= scrollPosition then
					pixelsBelowScrollbar = pixelsBelowScrollbar + guiObjects[pos].AbsoluteSize.Y
				else
					xCounter = xCounter + guiObjects[pos].AbsoluteSize.X
					rowSizeCounter = rowSizeCounter + 1
					if xCounter >= totalPixelsX then
						if setRowSize then
							rowSize = rowSizeCounter - 1
							setRowSize = false
						end
						
						rowSizeCounter = 0
						xCounter = 0
						if pixelsBelowScrollbar + guiObjects[pos].AbsoluteSize.Y <= totalPixelsY then
							pixelsBelowScrollbar = pixelsBelowScrollbar + guiObjects[pos].AbsoluteSize.Y
							if scrollPosition <= rowSize then
								scrollPosition = rowSize 
								break
							else
								scrollPosition = scrollPosition - rowSize 
							end
						else
							break
						end
					end
				end
				pos = pos - 1
			end

			xCounter = 0
			pos = scrollPosition
			rowSizeCounter = 0
			setRowSize = true
			local lastChildSize = 0
			
			local xOffset,yOffset = 0
			if guiObjects[1] then
				yOffset = math.ceil(math.floor(math.fmod(totalPixelsY,guiObjects[1].AbsoluteSize.X))/2)
				xOffset = math.ceil(math.floor(math.fmod(totalPixelsX,guiObjects[1].AbsoluteSize.Y))/2)
			end
			
			for i, child in ipairs(guiObjects) do
				if i < scrollPosition then
					child.Visible = false
				else
					if pixelsRemainingY < 0 then
						child.Visible = false
					else
						if setRowSize then rowSizeCounter = rowSizeCounter + 1 end
						if xCounter + child.AbsoluteSize.X >= totalPixelsX then
							if setRowSize then
								rowSize = rowSizeCounter - 1
								setRowSize = false
							end
							xCounter = 0
							pixelsRemainingY = pixelsRemainingY - child.AbsoluteSize.Y
						end
						child.Position = UDim2.new(child.Position.X.Scale,xCounter + xOffset, 0, totalPixelsY - pixelsRemainingY + yOffset)
						xCounter = xCounter + child.AbsoluteSize.X
						child.Visible = ((pixelsRemainingY - child.AbsoluteSize.Y) >= 0)
						lastChildSize = child.AbsoluteSize				
					end
				end
			end

			scrollUpButton.Active = (scrollPosition > 1)
			if lastChildSize == 0 then 
				scrollDownButton.Active = false
			else
				scrollDownButton.Active = ((pixelsRemainingY - lastChildSize.Y) < 0)
			end
		end


		local layoutSimpleScrollBar = function()
			local guiObjects = {}	
			
			if orderList then
				for i, child in ipairs(orderList) do
					if child.Parent == frame then
						table.insert(guiObjects, child)
					end
				end
			else
				local children = frame:GetChildren()
				if children then
					for i, child in ipairs(children) do 
						if child:IsA("GuiObject") then
							table.insert(guiObjects, child)
						end
					end
				end
			end
			if #guiObjects == 0 then
				scrollUpButton.Active = false
				scrollDownButton.Active = false
				scrollPosition = 1
				return
			end

			if scrollPosition > #guiObjects then
				scrollPosition = #guiObjects
			end
			
			local totalPixels = frame.AbsoluteSize.Y
			local pixelsRemaining = frame.AbsoluteSize.Y

			local pixelsBelowScrollbar = 0
			local pos = #guiObjects
			while pixelsBelowScrollbar < totalPixels and pos >= 1 do
				if pos >= scrollPosition then
					pixelsBelowScrollbar = pixelsBelowScrollbar + guiObjects[pos].AbsoluteSize.Y
				else
					if pixelsBelowScrollbar + guiObjects[pos].AbsoluteSize.Y <= totalPixels then
						pixelsBelowScrollbar = pixelsBelowScrollbar + guiObjects[pos].AbsoluteSize.Y
						if scrollPosition <= 1 then
							scrollPosition = 1
							break
						else
							scrollPosition = scrollPosition - 1
						end
					else
						break
					end
				end
				pos = pos - 1
			end
			pos = scrollPosition
			for i, child in ipairs(guiObjects) do
				if i < scrollPosition then
					child.Visible = false
				else
					if pixelsRemaining < 0 then
						child.Visible = false
					else
						child.Position = UDim2.new(child.Position.X.Scale, child.Position.X.Offset, 0, totalPixels - pixelsRemaining)
						pixelsRemaining = pixelsRemaining - child.AbsoluteSize.Y
						child.Visible = (pixelsRemaining >= 0)				
					end
				end
			end
			scrollUpButton.Active = (scrollPosition > 1)
			scrollDownButton.Active = (pixelsRemaining < 0)
		end

		local reentrancyGuard = false
		local recalculate = function()
			if reentrancyGuard then
				return
			end
			reentrancyGuard = true
			wait()
			local success, err = nil
			if style == "grid" then
				success, err = pcall(function() layoutGridScrollBar(frame) end)
			elseif style == "simple" then
				success, err = pcall(function() layoutSimpleScrollBar(frame) end)
			end
			if not success then print(err) end

			reentrancyGuard = false
		end

		local scrollUp = function()
			if scrollUpButton.Active then
				scrollPosition = scrollPosition - rowSize
				recalculate()
			end
		end

		local scrollDown = function()
			if scrollDownButton.Active then
				scrollPosition = scrollPosition + rowSize
				recalculate()
			end
		end

		local scrollMouseCount = 0
		scrollUpButton.MouseButton1Click:connect(
			function()
				scrollMouseCount = scrollMouseCount + 1
			end)
		scrollUpButton.MouseLeave:connect(
			function()
				scrollMouseCount = scrollMouseCount + 1
			end)

		scrollUpButton.MouseButton1Down:connect(
			function()
				scrollMouseCount = scrollMouseCount + 1

				scrollUp()
				local val = scrollMouseCount
				wait(0.5)
				while val == scrollMouseCount do
					if scrollUp() == false then
						break
					end
					wait(0.1)
				end				
			end)

		scrollDownButton.MouseButton1Click:connect(
			function()
				scrollMouseCount = scrollMouseCount + 1
			end)
		scrollDownButton.MouseLeave:connect(
			function()
				scrollMouseCount = scrollMouseCount + 1
			end)
		scrollDownButton.MouseButton1Down:connect(
			function()
				scrollMouseCount = scrollMouseCount + 1

				scrollDown()
				local val = scrollMouseCount
				wait(0.5)
				while val == scrollMouseCount do
					if scrollDown() == false then
						break
					end
					wait(0.1)
				end				
			end)


		frame.ChildAdded:connect(function()
			recalculate()
		end)

		frame.ChildRemoved:connect(function()
			recalculate()
		end)
		
		frame.Changed:connect(
			function(prop)
				if prop == "AbsoluteSize" then
					recalculate()
				end
			end)
		frame.AncestryChanged:connect(recalculate)

		return frame, scrollUpButton, scrollDownButton, recalculate
	end
	local function binaryGrow(min, max, fits)
		if min > max then
			return min
		end
		local biggestLegal = min

		while min <= max do
			local mid = min + math.floor((max - min) / 2)
			if fits(mid) and (biggestLegal == nil or biggestLegal < mid) then
				biggestLegal = mid
				min = mid + 1
			else
				max = mid - 1
			end
		end
		return biggestLegal
	end


	local function binaryShrink(min, max, fits)
		if min > max then
			return min
		end
		local smallestLegal = max

		while min <= max do
			local mid = min + math.floor((max - min) / 2)
			if fits(mid) and (smallestLegal == nil or smallestLegal > mid) then
				smallestLegal = mid
				max = mid - 1			
			else
				min = mid + 1
			end
		end
		return smallestLegal
	end


	local function getGuiOwner(instance)
		while instance ~= nil do
			if instance:IsA("ScreenGui") or instance:IsA("BillboardGui")  then
				return instance
			end
			instance = instance.Parent
		end
		return nil
	end

	t.AutoTruncateTextObject = function(textLabel)

		local text = textLabel.Text
		textLabel.TextColor3 = Color3.new(1,1,1)

		local fullLabel = textLabel:Clone()
		fullLabel.Name = "Full" .. textLabel.Name 
		fullLabel.BorderSizePixel = 0
		fullLabel.BackgroundTransparency = 0
		fullLabel.Text = text
		fullLabel.TextXAlignment = Enum.TextXAlignment.Center
		fullLabel.Position = UDim2.new(0,-3,0,0)
		fullLabel.Size = UDim2.new(0,00,0,0)
		fullLabel.Visible = false
		fullLabel.Parent = textLabel
		fullLabel.TextTransparency= 1
		local shortText = nil
		local mouseEnterConnection = nil
		local mouseLeaveConnection= nil

		local checkForResize = function()
			if getGuiOwner(textLabel) == nil then
				return
			end
			textLabel.Text = text
			if textLabel.TextFits then 
				if mouseEnterConnection then
					mouseEnterConnection:disconnect()
					mouseEnterConnection = nil
				end
				if mouseLeaveConnection then
					mouseLeaveConnection:disconnect()
					mouseLeaveConnection = nil
				end
			else
				local len = string.len(text)
				textLabel.Text = text .. "~"
				local textSize = binaryGrow(0, len, 
					function(pos)
						if pos == 0 then
							textLabel.Text = "~"
						else
							textLabel.Text = string.sub(text, 1, pos) .. "~"
						end
						return textLabel.TextFits
					end)
				shortText = string.sub(text, 1, textSize) .. "~"
				textLabel.Text = shortText
				if not fullLabel.TextFits then
					fullLabel.Size = UDim2.new(0, 0, 0, 0)
				end
				local fullLabelSize = binaryShrink(textLabel.AbsoluteSize.X,fullLabel.AbsoluteSize.X, 
					function(size)
						fullLabel.Size = UDim2.new(0, 0, 0, 0)
						return fullLabel.TextFits
					end)
				fullLabel.Size = UDim2.new(0,0,0,0)
				if mouseEnterConnection == nil then
					mouseEnterConnection = textLabel.MouseEnter:connect(
						function()
							fullLabel.ZIndex = textLabel.ZIndex + 1
							fullLabel.Visible = false
						end)
				end
				if mouseLeaveConnection == nil then
					mouseLeaveConnection = textLabel.MouseLeave:connect(
						function()
							fullLabel.Visible = false
						end)
				end
			end
		end
		textLabel.AncestryChanged:connect(checkForResize)
		textLabel.Changed:connect(
			function(prop) 
				if prop == "AbsoluteSize" then 
					checkForResize() 	
				end 
			end)

		checkForResize()

		local function changeText(newText)
			text = newText
			fullLabel.Text = text
			checkForResize()
		end

		return textLabel, changeText
	end

	local function TransitionTutorialPages(fromPage, toPage, transitionFrame, currentPageValue)	
		if fromPage then
			fromPage.Visible = false
			if transitionFrame.Visible == false then
				transitionFrame.Size = fromPage.Size
				transitionFrame.Position = fromPage.Position
			end
		else
			if transitionFrame.Visible == false then
				transitionFrame.Size = UDim2.new(0.0,50,0.0,50)
				transitionFrame.Position = UDim2.new(0.5,-25,0.5,-25)
			end
		end
		transitionFrame.Visible = true
		currentPageValue.Value = nil

		local newsize, newPosition
		if toPage then
			toPage.Visible = true

			newSize = toPage.Size
			newPosition = toPage.Position

			toPage.Visible = false
		else
			newSize = UDim2.new(0.0,50,0.0,50)
			newPosition = UDim2.new(0.5,-25,0.5,-25)
		end
		transitionFrame:TweenSizeAndPosition(newSize, newPosition, Enum.EasingDirection.InOut, Enum.EasingStyle.Quad, 0.3, true,
			function(state)
				if state == Enum.TweenStatus.Completed then
					transitionFrame.Visible = false
					if toPage then
						toPage.Visible = true
						currentPageValue.Value = toPage
					end
				end
			end)
	end

	t.CreateTutorial = function(name, tutorialKey, createButtons)
		local frame = Instance.new("Frame")
		frame.Name = "Tutorial-" .. name
		frame.BackgroundTransparency = 1
		frame.Size = UDim2.new(0.6, 0, 0.6, 0)
		frame.Position = UDim2.new(0.2, 0, 0.2, 0)

		local transitionFrame = Instance.new("Frame")
		transitionFrame.Name = "TransitionFrame"
		transitionFrame.Style = Enum.FrameStyle.RobloxRound
		transitionFrame.Size = UDim2.new(0.6, 0, 0.6, 0)
		transitionFrame.Position = UDim2.new(0.2, 0, 0.2, 0)
		transitionFrame.Visible = false
		transitionFrame.Parent = frame

		local currentPageValue = Instance.new("ObjectValue")
		currentPageValue.Name = "CurrentTutorialPage"
		currentPageValue.Value = nil
		currentPageValue.Parent = frame

		local boolValue = Instance.new("BoolValue")
		boolValue.Name = "Buttons"
		boolValue.Value = createButtons
		boolValue.Parent = frame

		local pages = Instance.new("Frame")
		pages.Name = "Pages"
		pages.BackgroundTransparency = 1
		pages.Size = UDim2.new(1,0,1,0)
		pages.Parent = frame

		local function getVisiblePageAndHideOthers()
			local visiblePage = nil
			local children = pages:GetChildren()
			if children then
				for i,child in ipairs(children) do
					if child.Visible then
						if visiblePage then
							child.Visible = false
						else
							visiblePage = child
						end
					end
				end
			end
			return visiblePage
		end

		local showTutorial = function(alwaysShow)
			if alwaysShow or UserSettings().GameSettings:GetTutorialState(tutorialKey) == false then
				print("Showing tutorial-",tutorialKey)
				local currentTutorialPage = getVisiblePageAndHideOthers()

				local firstPage = pages:FindFirstChild("TutorialPage1")
				if firstPage then
					TransitionTutorialPages(currentTutorialPage, firstPage, transitionFrame, currentPageValue)	
				else
					error("Could not find TutorialPage1")
				end
			end
		end

		local dismissTutorial = function()
			local currentTutorialPage = getVisiblePageAndHideOthers()

			if currentTutorialPage then
				TransitionTutorialPages(currentTutorialPage, nil, transitionFrame, currentPageValue)
			end

			UserSettings().GameSettings:SetTutorialState(tutorialKey, true)
		end

		local gotoPage = function(pageNum)
			local page = pages:FindFirstChild("TutorialPage" .. pageNum)
			local currentTutorialPage = getVisiblePageAndHideOthers()
			TransitionTutorialPages(currentTutorialPage, page, transitionFrame, currentPageValue)
		end

		return frame, showTutorial, dismissTutorial, gotoPage
	end 

	local function CreateBasicTutorialPage(name, handleResize, skipTutorial)
		local frame = Instance.new("Frame")
		frame.Name = "TutorialPage"
		frame.Style = Enum.FrameStyle.RobloxRound
		frame.Size = UDim2.new(0.6, 0, 0.6, 0)
		frame.Position = UDim2.new(0.2, 0, 0.2, 0)
		frame.Visible = false
		
		local frameHeader = Instance.new("TextLabel")
		frameHeader.Name = "Header"
		frameHeader.Text = name
		frameHeader.BackgroundTransparency = 1
		frameHeader.FontSize = Enum.FontSize.Size24
		frameHeader.Font = Enum.Font.ArialBold
		frameHeader.TextColor3 = Color3.new(1,1,1)
		frameHeader.TextXAlignment = Enum.TextXAlignment.Center
		frameHeader.TextWrap = true
		frameHeader.Size = UDim2.new(1,-55, 0, 22)
		frameHeader.Position = UDim2.new(0,0,0,0)
		frameHeader.Parent = frame

		local skipButton = Instance.new("ImageButton")
		skipButton.Name = "SkipButton"
		skipButton.AutoButtonColor = false
		skipButton.BackgroundTransparency = 1
		skipButton.Image = "http://www.roblox.com/asset/?id=37813546"	
		skipButton.MouseButton1Click:connect(function()
			skipButton.Image = "http://www.roblox.com/asset/?id=37813546"	
			skipTutorial()
		end)
		skipButton.MouseEnter:connect(function()
			skipButton.Image = "http://www.roblox.com/asset/?id=37813556"	
		end)
		skipButton.MouseLeave:connect(function()
			skipButton.Image = "http://www.roblox.com/asset/?id=37813546"	
		end)
		skipButton.Size = UDim2.new(0, 55, 0, 22)
		skipButton.Position = UDim2.new(1, -55, 0, 0)
		skipButton.Parent = frame

		local innerFrame = Instance.new("Frame")
		innerFrame.Name = "ContentFrame"
		innerFrame.BackgroundTransparency = 1
		innerFrame.Position = UDim2.new(0,0,0,22)
		innerFrame.Parent = frame

		local nextButton = Instance.new("TextButton")
		nextButton.Name = "NextButton"
		nextButton.Text = "Next"
		nextButton.TextColor3 = Color3.new(1,1,1)
		nextButton.Font = Enum.Font.Arial
		nextButton.FontSize = Enum.FontSize.Size18
		nextButton.Style = Enum.ButtonStyle.RobloxButtonDefault
		nextButton.Size = UDim2.new(0,80, 0, 32)
		nextButton.Position = UDim2.new(0.5, 5, 1, -32)
		nextButton.Active = false
		nextButton.Visible = false
		nextButton.Parent = frame

		local prevButton = Instance.new("TextButton")
		prevButton.Name = "PrevButton"
		prevButton.Text = "Previous"
		prevButton.TextColor3 = Color3.new(1,1,1)
		prevButton.Font = Enum.Font.Arial
		prevButton.FontSize = Enum.FontSize.Size18
		prevButton.Style = Enum.ButtonStyle.RobloxButton
		prevButton.Size = UDim2.new(0,80, 0, 32)
		prevButton.Position = UDim2.new(0.5, -85, 1, -32)
		prevButton.Active = false
		prevButton.Visible = false
		prevButton.Parent = frame

		innerFrame.Size = UDim2.new(1,0,1,-22-35)

		local parentConnection = nil

		local function basicHandleResize()
			if frame.Visible and frame.Parent then
				local maxSize = math.min(frame.Parent.AbsoluteSize.X, frame.Parent.AbsoluteSize.Y)
				handleResize(200,maxSize)
			end
		end

		frame.Changed:connect(
			function(prop)
				if prop == "Parent" then
					if parentConnection ~= nil then
						parentConnection:disconnect()
						parentConnection = nil
					end
					if frame.Parent and frame.Parent:IsA("GuiObject") then
						parentConnection = frame.Parent.Changed:connect(
							function(parentProp)
								if parentProp == "AbsoluteSize" then
									wait()
									basicHandleResize()
								end
							end)
						basicHandleResize()
					end
				end

				if prop == "Visible" then 
					basicHandleResize()
				end
			end)

		return frame, innerFrame
	end

	t.CreateTextTutorialPage = function(name, text, skipTutorialFunc)
		local frame = nil
		local contentFrame = nil

		local textLabel = Instance.new("TextLabel")
		textLabel.BackgroundTransparency = 1
		textLabel.TextColor3 = Color3.new(1,1,1)
		textLabel.Text = text
		textLabel.TextWrap = true
		textLabel.TextXAlignment = Enum.TextXAlignment.Left
		textLabel.TextYAlignment = Enum.TextYAlignment.Center
		textLabel.Font = Enum.Font.Arial
		textLabel.FontSize = Enum.FontSize.Size14
		textLabel.Size = UDim2.new(1,0,1,0)

		local function handleResize(minSize, maxSize)
			size = binaryShrink(minSize, maxSize,
				function(size)
					frame.Size = UDim2.new(0, size, 0, size)
					return textLabel.TextFits
				end)
			frame.Size = UDim2.new(0, size, 0, size)
			frame.Position = UDim2.new(0.5, -size/2, 0.5, -size/2)
		end

		frame, contentFrame = CreateBasicTutorialPage(name, handleResize, skipTutorialFunc)
		textLabel.Parent = contentFrame

		return frame
	end

	t.CreateImageTutorialPage = function(name, imageAsset, x, y, skipTutorialFunc)
		local frame = nil
		local contentFrame = nil

		local imageLabel = Instance.new("ImageLabel")
		imageLabel.BackgroundTransparency = 1
		imageLabel.Image = imageAsset
		imageLabel.Size = UDim2.new(0,x,0,y)
		imageLabel.Position = UDim2.new(0.5,-x/2,0.5,-y/2)

		local function handleResize(minSize, maxSize)
			size = binaryShrink(minSize, maxSize,
				function(size)
					return size >= x and size >= y
				end)
			if size >= x and size >= y then
				imageLabel.Size = UDim2.new(0,x, 0,y)
				imageLabel.Position = UDim2.new(0.5,-x/2, 0.5, -y/2)
			else
				if x > y then
					imageLabel.Size = UDim2.new(1,0,y/x,0)
					imageLabel.Position = UDim2.new(0,0, 0.5 - (y/x)/2, 0)
				else
					imageLabel.Size = UDim2.new(x/y,0,1, 0)
					imageLabel.Position = UDim2.new(0.5-(x/y)/2, 0, 0, 0)
				end
			end
			frame.Size = UDim2.new(0, size, 0, size)
			frame.Position = UDim2.new(0.5, -size/2, 0.5, -size/2)
		end

		frame, contentFrame = CreateBasicTutorialPage(name, handleResize, skipTutorialFunc)
		imageLabel.Parent = contentFrame

		return frame
	end

	t.AddTutorialPage = function(tutorial, tutorialPage)
		local transitionFrame = tutorial.TransitionFrame
		local currentPageValue = tutorial.CurrentTutorialPage

		if not tutorial.Buttons.Value then
			tutorialPage.ContentFrame.Size = UDim2.new(1,0,1,-22)
			tutorialPage.NextButton.Parent = nil
			tutorialPage.PrevButton.Parent = nil
		end

		local children = tutorial.Pages:GetChildren()
		if children and #children > 0 then
			tutorialPage.Name = "TutorialPage" .. (#children+1)
			local previousPage = children[#children]
			if not previousPage:IsA("GuiObject") then
				error("All elements under Pages must be GuiObjects")
			end

			if tutorial.Buttons.Value then
				if previousPage.NextButton.Active then
					error("NextButton already Active on previousPage, please only add pages with RbxGui.AddTutorialPage function")
				end
				previousPage.NextButton.MouseButton1Click:connect(
					function()
						TransitionTutorialPages(previousPage, tutorialPage, transitionFrame, currentPageValue)
					end)
				previousPage.NextButton.Active = true
				previousPage.NextButton.Visible = true

				if tutorialPage.PrevButton.Active then
					error("PrevButton already Active on tutorialPage, please only add pages with RbxGui.AddTutorialPage function")
				end
				tutorialPage.PrevButton.MouseButton1Click:connect(
					function()
						TransitionTutorialPages(tutorialPage, previousPage, transitionFrame, currentPageValue)
					end)
				tutorialPage.PrevButton.Active = true
				tutorialPage.PrevButton.Visible = true
			end

			tutorialPage.Parent = tutorial.Pages
		else
			tutorialPage.Name = "TutorialPage1"
			tutorialPage.Parent = tutorial.Pages
		end
	end 

	t.Help = 
		function(funcNameOrFunc) 
			if funcNameOrFunc == "CreatePropertyDropDownMenu" or funcNameOrFunc == t.CreatePropertyDropDownMenu then
				return "Function CreatePropertyDropDownMenu.  " ..
					   "Arguments: (instance, propertyName, enumType).  " .. 
					   "Side effect: returns a container with a drop-down-box that is linked to the property field of instance which is of type enumType" 
			end 
			if funcNameOrFunc == "CreateDropDownMenu" or funcNameOrFunc == t.CreateDropDownMenu then
				return "Function CreateDropDownMenu.  " .. 
					   "Arguments: (items, onItemSelected).  " .. 
					   "Side effect: Returns 2 results, a container to the gui object and a updateSelection function for external updating.  The container is a drop-down-box created around a list of items" 
			end 
			if funcNameOrFunc == "CreateMessageDialog" or funcNameOrFunc == t.CreateMessageDialog then
				return "Function CreateMessageDialog.  " .. 
					   "Arguments: (title, message, buttons). " .. 
					   "Side effect: Returns a gui object of a message box with title and message as passed in.  buttons input is an array of Tables contains a Text and Function field for the text/callback of each button"
			end		
			if funcNameOrFunc == "CreateStyledMessageDialog" or funcNameOrFunc == t.CreateStyledMessageDialog then
				return "Function CreateStyledMessageDialog.  " .. 
					   "Arguments: (title, message, style, buttons). " .. 
					   "Side effect: Returns a gui object of a message box with title and message as passed in.  buttons input is an array of Tables contains a Text and Function field for the text/callback of each button, style is a string, either Error, Notify or Confirm"
			end
			if funcNameOrFunc == "GetFontHeight" or funcNameOrFunc == t.GetFontHeight then
				return "Function GetFontHeight.  " .. 
					   "Arguments: (font, fontSize). " .. 
					   "Side effect: returns the size in pixels of the given font + fontSize"
			end
			if funcNameOrFunc == "LayoutGuiObjects" or funcNameOrFunc == t.LayoutGuiObjects then
			
			end
			if funcNameOrFunc == "CreateScrollingFrame" or funcNameOrFunc == t.CreateScrollingFrame then
				return "Function CreateScrollingFrame.  " .. 
				   "Arguments: (orderList, style) " .. 
				   "Side effect: returns 4 objects, (scrollFrame, scrollUpButton, scrollDownButton, recalculateFunction).  scrollFrame can be filled with GuiObjects.  It will lay them out and allow scrollUpButton/scrollDownButton to interact with them.  Orderlist is optional (and specifies the order to layout the children.  Without orderlist, it uses the children order. style is also optional, and allows for a grid styling if style is passed grid as a string.  recalculateFunction can be called when a relayout is needed (when orderList changes)"
			end
			if funcNameOrFunc == "AutoTruncateTextObject" or funcNameOrFunc == t.AutoTruncateTextObject then
				return "Function AutoTruncateTextObject.  " .. 
				   "Arguments: (textLabel) " .. 
				   "Side effect: returns 2 objects, (textLabel, changeText).  The textLabel input is modified to automatically truncate text (with ellipsis), if it gets too small to fit.  changeText is a function that can be used to change the text, it takes 1 string as an argument"
			end
			if funcNameOrFunc == "CreateSlider" or funcNameOrFunc == t.CreateSlider then
				return "Function CreateSlider.  " ..
					"Arguments: (steps, width, position) " ..
					"Side effect: returns 2 objects, (sliderGui, sliderPosition).  The steps argument specifies how many different positions the slider can hold along the bar.  width specifies in pixels how wide the bar should be (modifiable afterwards if desired). position argument should be a UDim2 for slider positioning. sliderPosition is an IntValue whose current .Value specifies the specific step the slider is currently on."
			end
		end
		
	local RbxGui
	local friendWord = "Friend"
	local friendWordLowercase = "friend"
	local bigEasingStyle = Enum.EasingStyle.Back
	local smallEasingStyle = Enum.EasingStyle.Quart
	local lightBackground = true

	local function waitForChild(instance, name)
	coroutine.resume(coroutine.create(function()

		while not instance:FindFirstChild(name) do
			instance.ChildAdded:wait()
		end
		end))
	end

	local function waitForProperty(instance, prop)

	end

	local function Color3I(r,g,b)
	  return Color3.new(r/255,g/255,b/255)
	end

	function robloxLock(instance)

	end

	function ArrayRemove(t, obj)
		for i, obj2 in ipairs(t) do
			if obj == obj2 then
				table.remove(t, i)
				return true
			end
		end
		return false
	end

	local function getPlayers()
		local result = {}
	   local players = game:GetService("Players"):GetChildren()
		if players then
			for i, player in ipairs(players) do
				if player:IsA("Player") then 
					table.insert(result, player)
				end
			end
		end
		return result
	end

	local brickColorTable = {}
	for i = 0, 63 do
	   brickColorTable[BrickColor.palette(i).Name] = BrickColor.palette(i).Color
	end

	local function remapColor(i, j)
	  brickColorTable[BrickColor.palette(i).Name] = BrickColor.palette(j).Color
	end

	remapColor(13, 12)
	remapColor(14, 12)
	remapColor(15, 12)
	remapColor(61, 29)
	remapColor(63, 62)
	remapColor(56, 50)
	remapColor(45, 53)
	remapColor(51, 20)
	remapColor(4, 20)
	remapColor(59, 35)
	remapColor(60, 29)

	local function getColor(brickColor)
	  if brickColorTable[brickColor.Name] then
		return brickColorTable[brickColor.Name] 
	  else
		return brickColor.Color;
	  end
	end



	local function getTeams()
		local result = {}
		local teams = game:GetService("Teams"):GetChildren()
		for i, team in ipairs(teams) do
			if team:IsA("Team") then 
				table.insert(result, team)
			end
		end
		return result	
	end

	local supportFriends = false
	local currentBoardType = "PlayerList"
	local currentStatCount = 0

	local createBoardsFunction = nil


	local playerTable = {}
	local teamTable = {}
	local teamColorTable	= {}

	local removePlayerFunction = nil
	local recreatePlayerFunction = nil
	local addPlayerFunction = function(player)
		if recreatePlayerFunction then
			recreatePlayerFunction(player)
		end
	end
	local sortPlayerListsFunction = nil

	local minimizedState = nil
	local bigWindowImposter = nil
	local smallWindowPosition = UDim2.new(0, -20, 0,5)
	local smallWindowSize = UDim2.new(1,0,1,0)
	local bigWindowSize = UDim2.new(0.6,0,0.6,0) 
	local bigWindowPosition = UDim2.new(.2, 0, .2,0)

	local debounceTeamsChanged = false

	local currentWindowState = "Small"
	local previousWindowState = nil
	local transitionWindowsFunction = nil

	local container = nil
	local topRightTrayContainer = nil

	local playerContextMenu = nil
	local contextMenuElements = {}

	local function addContextMenuLabel(getText1, getText2, isVisible)
		local t = {}
		t.Type = "Label"
		t.GetText1 = getText1
		t.GetText2 = getText2
		t.IsVisible = isVisible
		table.insert(contextMenuElements, t)
	end
	local function addContextMenuButton(text, isVisible, isActive, doIt)
		local t = {}
		t.Text = text
		t.Type = "Button"
		t.IsVisible = isVisible
		t.IsActive = isActive
		t.DoIt = doIt
		table.insert(contextMenuElements, t)
	end

	local function getFriendStatus(player)
		if player == game.Players.LocalPlayer then
			return Enum.FriendStatus.NotFriend
		else
			return Enum.FriendStatus.NotFriend
		end
	end
	addContextMenuLabel(
		function(player) 
			return "Loading..."
		end,
		nil,
		function(player) 
			return getFriendStatus(player) == Enum.FriendStatus.Unknown
		end)
	addContextMenuButton("Send " .. friendWord .. " Request", 
		function(player) 
			return getFriendStatus(player) == Enum.FriendStatus.NotFriend
		end, 
		function(player) 
			return true 
		end, 
		function(player) 
			return game.Players.LocalPlayer:RequestFriendship(player)
		end
	)
	addContextMenuButton("Un" .. friendWordLowercase, 
		function(player) 
			return getFriendStatus(player) == Enum.FriendStatus.Friend
		end, 
		function(player) 
			return true 
		end, 
		function(player) 
		end
	)
	addContextMenuButton("Accept " .. friendWord .. " Request", 
		function(player) 
			return getFriendStatus(player) == Enum.FriendStatus.FriendRequestReceived
		end, 
		function(player) 
			return true 
		end, 
		function(player) 
		end
	)

	addContextMenuButton("Deny " .. friendWord .. " Request", 
		function(player) 
			return getFriendStatus(player) == Enum.FriendStatus.FriendRequestReceived
		end,
		function(player) 
			return true 
		end, 
		function(player) 
			return game.Players.LocalPlayer:RevokeFriendship(player)
		end
	)

	addContextMenuButton("Cancel " .. friendWord .. " Request", 
		function(player) 
			return getFriendStatus(player) == Enum.FriendStatus.FriendRequestSent
		end, 
		function(player) 
			return true 
		end, 
		function(player) 
			return game.Players.LocalPlayer:RevokeFriendship(player)
		end
	)


	local function getStatColumns(players)
		for i, player in ipairs(players) do
			local leaderstats = player:FindFirstChild("leaderstats")
			if leaderstats then
				local stats = {} 
				local children = leaderstats:GetChildren()
				if children then
					for i, stat in ipairs(children) do
						if stat:IsA("IntValue") then
							table.insert(stats, stat.Name)
						else
							table.insert(stats, stat.Name)
						end
					end
				end
				return stats
			end		
		end
		return nil
	end

	local function determineBoardType()
		local players = getPlayers()
		
		local foundLeaderstats = false
		local numStats = 0
		local foundTeam = false

		local stats = getStatColumns(players)
		if stats then
			foundLeaderstats = true
			numStats = #stats
		end

		for i, player in ipairs(players) do
			if not foundTeam then
				if not player.Neutral then
					foundTeam = true
					break
				end
			end
		end
		
		if foundLeaderstats and foundTeam then
			return "TeamScore", numStats
		elseif foundLeaderstats then
			return "PlayerScore", numStats
		elseif foundTeam then
			return "TeamList", numStats
		else
			return "PlayerList", numStats
		end
	end

	local function toggleBigWindow()
		if container == nil then
			return
		end

		if currentWindowState == "Big" then
			if previousWindowState == nil or previousWindowState == "Big" or previousWindowState == "None" then
				transitionWindowsFunction("None")
			else
				transitionWindowsFunction("Small")
			end
		else
			previousWindowState = currentWindowState
			transitionWindowsFunction("Big")
		end
	end
	local previousBigPlayerList = nil
	local function rebuildBoard(owner, boardType, numStats)
		print("RebuildBoard")
		if topRightTrayContainer == nil then
			topRightTrayContainer = owner:FindFirstChild("PlayerListTopRightFrame")
			if topRightTrayContainer == nil then
				topRightTrayContainer = Instance.new("Frame")
				topRightTrayContainer.Name = "PlayerListTopRightFrame"
				topRightTrayContainer.BackgroundTransparency = 1
				topRightTrayContainer.Size = UDim2.new(0.2, 16, 0.42, 16)
				topRightTrayContainer.Position = UDim2.new(0.8, 0, 0, 0)
				topRightTrayContainer.Parent = container
			end
		end
		if minimizedState == nil then
			minimizedState = Instance.new("Frame")
			minimizedState.Name = "MinimizedPlayerlist"
			minimizedState.BackgroundTransparency = 1
			minimizedState.Position = UDim2.new(1, -166, 0,0)
			minimizedState.Size = UDim2.new(0, 151, 0, 30)
			playerListButton = Instance.new("ImageButton")
			playerListButton.Name = "GoSmallButton"
			playerListButton.Image = "rbxasset://textures/ui/playerlist_hidden_small.png"
			playerListButton.BackgroundTransparency = 1
			playerListButton.Size = UDim2.new(0.0, 35, 0, 30)
			playerListButton.Position = UDim2.new(1, -35, 0, 0)
			playerListButton.MouseButton1Click:connect(
				function()
					transitionWindowsFunction("Small")
				end)
			playerListButton.Parent = minimizedState

			minimizedState.Visible = false
			robloxLock(minimizedState)
			minimizedState.Parent = topRightTrayContainer
		end
		if bigWindowImposter == nil then
			bigWindowImposter = owner:FindFirstChild("BigPlayerListWindowImposter")
			if bigWindowImposter == nil then
				bigWindowImposter = Instance.new("Frame")
				bigWindowImposter.Name = "BigPlayerListWindowImposter"
				bigWindowImposter.Visible = false
				bigWindowImposter.BackgroundColor3 = Color3.new(0,0,0)
				bigWindowImposter.BackgroundTransparency = 0.7
				bigWindowImposter.BorderSizePixel = 0
				bigWindowImposter.Size = UDim2.new(0.4, 7, 0.4, 7)
				bigWindowImposter.Position = UDim2.new(0.3, 0, 0.3, 0)
				robloxLock(bigWindowImposter)
				bigWindowImposter.Parent = container
			end
		end
		if container == nil or container ~= owner then
			container = owner

			topRightTrayContainer.Parent = container
			bigWindowImposter.Parent = container
		end

		local smallVisible = true
		local bigVisible = false
		if container then
			if topRightTrayContainer then
				if topRightTrayContainer:FindFirstChild("SmallPlayerlist") then
					smallVisible = topRightTrayContainer.SmallPlayerlist.Visible
					topRightTrayContainer.SmallPlayerlist.Parent = nil
					print("Removed small playerlist")
				else			
					print("Did not remove small playerlist")
				end
			end
			if container:FindFirstChild("BigPlayerlist") then
				bigVisible = container.BigPlayerlist.Visible or (previousBigPlayerList ~= nil)
				container.BigPlayerlist.Parent = nil
				if previousBigPlayerList ~= nil then
					pcall(function() game.GuiService:RemoveCenterDialog(previousBigPlayerList) end)
					previousBigPlayerList = nil
				end
			end
		end

		local smallBoard, bigBoard = createBoardsFunction(boardType, numStats)
		if smallBoard then
			smallBoard.Visible = smallVisible
			smallBoard.Parent = topRightTrayContainer
		end
		if bigBoard then
			if bigVisible then
				previousBigPlayerList = bigBoard
				local centerDialogSupported, msg = pcall(function() game.GuiService:AddCenterDialog(previousBigPlayerList, Enum.CenterDialogType.PlayerInitiatedDialog, 
					function()
						previousBigPlayerList.Visible = true
					end)
				end)
				bigBoard.Visible = bigVisible
			else
				bigBoard.Visible = false
			end
			bigBoard.Parent = container
		end
		return container
	end

	local function showBigPlayerWindow()
		if container:FindFirstChild("BigPlayerlist") then
			if container.BigPlayerlist.Visible then
				return
			end
		end
		
		bigWindowImposter.Visible = true
		bigWindowImposter:TweenSizeAndPosition(bigWindowSize, bigWindowPosition, Enum.EasingDirection.Out, bigEasingStyle, 0.3, true,
			function(state)
				if state == Enum.TweenStatus.Completed then 
					bigWindowImposter.Visible = false 
					if container:FindFirstChild("BigPlayerlist") then
						container.BigPlayerlist.Visible = true
					end		
				end
			end)
	end

	local function hideBigPlayerWindow(completed)
		if playerContextMenu then
			playerContextMenu.Visible = false
		end
		
		if container:FindFirstChild("BigPlayerlist") then
			if container.BigPlayerlist.Visible == false and bigWindowImposter.Visible == false then
				if completed then
					completed()
				end
				return
			end
			container.BigPlayerlist.Visible = false
		end

		local completedFunction = completed
		bigWindowImposter.Visible = true
		bigWindowImposter:TweenSizeAndPosition(UDim2.new(0.4, 0, 0.4, 0), UDim2.new(0.3, 0, 0.3, 0), Enum.EasingDirection.In, Enum.EasingStyle.Quart, 0.15, true,
			function(state) 
				if state == Enum.TweenStatus.Completed then 
					bigWindowImposter.Visible = false 
					if completedFunction then
						completedFunction()
					end
				end
			end)
	end
	local function hideSmallPlayerWindow(completed)
		if playerContextMenu then
			playerContextMenu.Visible = false
		end
		if topRightTrayContainer:FindFirstChild("SmallPlayerlist") then
			local completedFunction = completed
			if topRightTrayContainer.SmallPlayerlist.Visible then
				topRightTrayContainer.SmallPlayerlist:TweenPosition(UDim2.new(1,0,smallWindowPosition.Y.Scale, smallWindowPosition.Y.Offset), Enum.EasingDirection.Out, smallEasingStyle, 0.3, true, 
					function(state) 
						if state == Enum.TweenStatus.Completed then 
							if topRightTrayContainer:FindFirstChild("SmallPlayerlist") then
								topRightTrayContainer.SmallPlayerlist.Visible = false
							end
							if completedFunction then
								completedFunction()
							end
						end
					end)
				return
			end
		end
		if completed then
			completed()
		end
	end


	transitionWindowsFunction = function(desiredState)
		if desiredState == "Big" then
			minimizedState.Visible = false
			hideSmallPlayerWindow()
		
			if previousBigPlayerList ~= nil then
				if previousBigPlayerList ~= container:FindFirstChild("BigPlayerlist") then
					pcall(function() game.GuiService:RemoveCenterDialog(previousBigPlayerList) end)
					previousBigPlayerList = nil
					previousBigPlayerList = container:FindFirstChild("BigPlayerlist")
				end
			else
				previousBigPlayerList = container:FindFirstChild("BigPlayerlist")
			end

			if previousBigPlayerList then
				local firstShow = false
				local centerDialogSupported, msg = pcall(function() game.GuiService:AddCenterDialog(previousBigPlayerList, Enum.CenterDialogType.PlayerInitiatedDialog, 
					function()
						if not firstShow then
							showBigPlayerWindow()
							firstShow = true
						else
							previousBigPlayerList.Visible = true
						end
					end)
				end)
				if centerDialogSupported == false then
					print("Exception", msg)
					showBigPlayerWindow()
				end
			else
				showBigPlayerWindow()
			end
			currentWindowState = "Big"
		elseif desiredState == "Small" then
			minimizedState.Visible = false
			if previousBigPlayerList ~= nil then
				pcall(function() game.GuiService:RemoveCenterDialog(previousBigPlayerList) end)
				previousBigPlayerList = nil
			end
			
			hideBigPlayerWindow()
			if topRightTrayContainer:FindFirstChild("SmallPlayerlist") then
				if not topRightTrayContainer.SmallPlayerlist.Visible or topRightTrayContainer.SmallPlayerlist.Position ~= smallWindowPosition then
					topRightTrayContainer.SmallPlayerlist.Visible = true
					topRightTrayContainer.SmallPlayerlist:TweenPosition(smallWindowPosition, Enum.EasingDirection.Out, smallEasingStyle, 0.3, true)
				end
			end
			currentWindowState = "Small"
		elseif desiredState == "None" then
			if previousBigPlayerList ~= nil then
				pcall(function() game.GuiService:RemoveCenterDialog(previousBigPlayerList) end)
				previousBigPlayerList = nil
			end
			
			local smallDone = false
			local bigDone = false
			hideSmallPlayerWindow(
				function() 
					smallDone = true 
					if bigDone and smallDone then
						minimizedState.Visible = true
					end
				end)
			hideBigPlayerWindow(			
				function() 
					bigDone = true 
					if bigDone and smallDone then
						minimizedState.Visible = true
					end
				end)		
			currentWindowState = "None"
		end
	end

	local function getStatValuesForPlayer(player)
		local leaderstats = player:FindFirstChild("leaderstats")
		if leaderstats then
			local children = leaderstats:GetChildren()
			if children then
				local result = {}
				for i, stat in ipairs(children) do
						table.insert(result, stat)
				end
				return result, leaderstats
			end
		end
		return nil
	end
	if UserSettings and LoadLibrary then

		RbxGui,msg = t
		print("Libraries loaded")

		local function createTeamName(name, color)
			local fontHeight = 20
			local frame = Instance.new("Frame")
			frame.Name = "Team-" .. name
			frame.BorderSizePixel = 0
			frame.BackgroundTransparency = 0.5
			frame.BackgroundColor3 = Color3.new(1,1,1)
			frame.Size = UDim2.new(1, 0, 0, fontHeight)
			frame.Position = UDim2.new(0,0,0,0)

			local label = Instance.new("TextLabel")
			label.Name = "NameLabel"
			label.Text = " " .. name
			label.Font = Enum.Font.ArialBold
			label.FontSize = Enum.FontSize.Size18
			label.Position = UDim2.new(0,0,0,0)
			label.Size = UDim2.new(1,0,1,0)
			label.TextColor3 = Color3.new(1,1,1)
			label.BackgroundTransparency = 0.5
			label.BackgroundColor3 = getColor(color)
			label.BorderSizePixel = 0
			label.TextXAlignment = Enum.TextXAlignment.Left
			label = RbxGui.AutoTruncateTextObject(label)
			label.Parent = frame
			
			return frame
		end

		local function getFriendStatusIcon(friendStatus)
			if friendStatus == Enum.FriendStatus.Unknown or friendStatus == Enum.FriendStatus.NotFriend then
				return nil
			elseif friendStatus == Enum.FriendStatus.Friend then
				return "rbxasset://textures/ui/PlayerlistFriendIcon.png"
			elseif friendStatus == Enum.FriendStatus.FriendRequestSent then
				return "rbxasset://textures/ui/PlayerlistFriendRequestSentIcon.png"
			elseif friendStatus == Enum.FriendStatus.FriendRequestReceived then
				return "rbxasset://textures/ui/PlayerlistFriendRequestReceivedIcon.png"
			else
				error("Unknown FriendStatus: " .. friendStatus)
			end
		end

		local function getMembershipTypeIcon(membershipType)
			if membershipType == Enum.MembershipType.None then
				return ""
			elseif membershipType == Enum.MembershipType.BuildersClub then
				return "rbxasset://textures/ui/TinyBcIcon.png"
			elseif membershipType == Enum.MembershipType.TurboBuildersClub then
				return "rbxasset://textures/ui/TinyTbcIcon.png"
			elseif membershipType == Enum.MembershipType.OutrageousBuildersClub then
				return "rbxasset://textures/ui/TinyObcIcon.png"
			else
				error("Uknown membershipType" .. membershipType)
			end	
		end


		local function updatePlayerFriendStatus(nameObject, friendStatus)
			local fontHeight = 20

			local friendIconImage = getFriendStatusIcon(friendStatus)
			nameObject.MembershipTypeLabel.FriendStatusLabel.Visible = (friendIconImage ~= nil)

			if friendIconImage ~= nil then 
				nameObject.MembershipTypeLabel.FriendStatusLabel.Image = friendIconImage
				nameObject.NameLabel.Position =UDim2.new(0,2*fontHeight,0,1)
				nameObject.NameLabel.Size = UDim2.new(1,-2*fontHeight,1,-2)
			else
				nameObject.NameLabel.Position = UDim2.new(0,fontHeight+1,0,1)
				nameObject.NameLabel.Size = UDim2.new(1,-(fontHeight+1),1,-2)
			end
		end
		local function updatePlayerName(nameObject, membershipStatus, teamColor)
			local fontHeight = 20
			nameObject.Size = UDim2.new(1,0,0,fontHeight)
			nameObject.MembershipTypeLabel.Image = tags[string.lower(nameObject.NameLabel.FullNameLabel.Text)] or ""
		end

		
		local function updatePlayerNameColor(player, teamColor)
			local function updatePlayerNameColorHelper(nameObject)
				if teamColor ~= nil then
					nameObject.NameLabel.TextColor3 = getColor(teamColor)
					nameObject.NameLabel.FullNameLabel.TextColor3 = getColor(teamColor)
				else
					nameObject.NameLabel.TextColor3 = Color3.new(1,1,1)
					nameObject.NameLabel.FullNameLabel.TextColor3 = Color3.new(1,1,1)
				end
			end
			
			updatePlayerNameColorHelper(playerTable[player].NameObjectSmall)
			updatePlayerNameColorHelper(playerTable[player].NameObjectBig)
		end


		local function createPlayerName(name, membershipStatus, teamColor, friendStatus)
			local frame = Instance.new("Frame")
			frame.Name = "Player_" .. name
			if lightBackground then
				frame.BackgroundColor3 = Color3.new(1,1,1)
			else
				frame.BackgroundColor3 = Color3.new(1,1,1)
			end
			frame.BackgroundTransparency = 0.5
			frame.BorderSizePixel = 0
			
			local membershipStatusLabel = Instance.new("ImageLabel")
			membershipStatusLabel.Name = "MembershipTypeLabel"
			membershipStatusLabel.BackgroundTransparency = 1
			membershipStatusLabel.Size = UDim2.new(1,0,1,0)
			membershipStatusLabel.Position = UDim2.new(0,0,0,0)
			membershipStatusLabel.SizeConstraint = Enum.SizeConstraint.RelativeYY
			membershipStatusLabel.Parent = frame

			local friendStatusLabel = Instance.new("ImageLabel")
			friendStatusLabel.Name = "FriendStatusLabel"
			friendStatusLabel.Visible = false
			friendStatusLabel.BackgroundTransparency = 1
			friendStatusLabel.Size = UDim2.new(1,0,1,0)
			friendStatusLabel.Position = UDim2.new(1,0,0,0)
			friendStatusLabel.Parent = membershipStatusLabel

			local changeNameFunction
			local nameLabel = Instance.new("TextLabel")
			nameLabel.Name = "NameLabel"
			nameLabel.Text = ""..name
			nameLabel.Font = Enum.Font.ArialBold
			nameLabel.FontSize = Enum.FontSize.Size14
			nameLabel.TextColor3 = Color3.new(1,1,1)
			nameLabel.BackgroundTransparency = 1
			nameLabel.BackgroundColor3 = Color3.new(0,0,0)
			nameLabel.TextXAlignment = Enum.TextXAlignment.Left
			nameLabel, changeNameFunction = RbxGui.AutoTruncateTextObject(nameLabel)
			nameLabel.Parent = frame
			
			updatePlayerName(frame, membershipStatus, teamColor)
			if supportFriends then
				updatePlayerFriendStatus(frame, friendStatus)
			else
				updatePlayerFriendStatus(frame, Enum.FriendStatus.NotFriend)
			end
			return frame, changeNameFunction
		end

		local function createStatColumn(i, numColumns, isTeam, color3, isHeader)
			local textLabel = Instance.new("TextLabel")
			textLabel.Name = "Stat" .. i
			textLabel.TextColor3 = Color3.new(1,1,1)
			textLabel.TextXAlignment = Enum.TextXAlignment.Right
			textLabel.TextYAlignment = Enum.TextYAlignment.Center
			textLabel.FontSize = Enum.FontSize.Size14
			if isHeader then
				textLabel.FontSize = Enum.FontSize.Size18
			else
				textLabel.FontSize = Enum.FontSize.Size14
			end
			if isHeader or isTeam then
				textLabel.Font = Enum.Font.ArialBold
			else 
				textLabel.Font = Enum.Font.Arial
			end

			if isTeam then
				textLabel.BackgroundColor3 = color3
				textLabel.Text = 0
			else
				textLabel.BackgroundColor3 = Color3.new(0,0,0)
				textLabel.Text = ""
			end
			textLabel.BackgroundTransparency = 1
			if i == numColumns then
				textLabel.Size = UDim2.new(1/numColumns, -6, 1, 0)
			else
				textLabel.Size = UDim2.new(1/numColumns, -4, 1, 0)
			end
			
			textLabel.Position = UDim2.new((i-1) * (1/numColumns), 0, 0, 0)
			return RbxGui.AutoTruncateTextObject(textLabel)
		end

		local function createStatHeaders(stats, numColumns, isBig)
			local frame = Instance.new("Frame")
			frame.Name = "Headers"
			frame.BorderSizePixel = 0
			frame.BackgroundColor3 = Color3.new(0,0,0)
			frame.BackgroundTransparency = 1
			
			local nameSize
			if isBig then
				nameSize = 0.5
			elseif numColumns == 1 then
				nameSize = 0.7
			elseif numColumns == 2 then
				nameSize = 0.6
			else
				nameSize = 0.45
			end
			frame.Size = UDim2.new(1-nameSize, 0, 1,0)
			if isBig then
				frame.Position = UDim2.new(nameSize,-25, 0,0)
			else
				frame.Position = UDim2.new(nameSize,0, 0,0)
			end

			local i = 1
			while i <= numColumns do
				local headerColumn, changeText = createStatColumn(i, numColumns, false, nil, true)
				changeText(stats[i])
				headerColumn.Parent = frame
				i = i + 1
			end		
			return frame, textChangers
		end

		local function createStatColumns(nameObject, numColumns, isTeam, isBig) 
			local frame = Instance.new("Frame")
			frame.Name = nameObject.Name .. "_WithStats"
			frame.BorderSizePixel = 0
			frame.BackgroundColor3 = nameObject.BackgroundColor3
			frame.BackgroundTransparency = nameObject.BackgroundTransparency
			frame.Size = nameObject.Size
			frame.Position = nameObject.Position

			nameObject.BackgroundTransparency = 1

			if numColumns == 0 then
				nameObject.Size = UDim2.new(1,0,1,0)
				nameObject.Position = UDim2.new(0,0,0,0)
				nameObject.Parent = frame
				return frame
			end

			local statFrame = Instance.new("Frame")
			statFrame.Name = "Stats"
			if isTeam then
				statFrame.BorderSizePixel = 0
				statFrame.BackgroundColor3 = nameObject.NameLabel.BackgroundColor3
				statFrame.BackgroundTransparency = nameObject.NameLabel.BackgroundTransparency
			else
				statFrame.BackgroundTransparency = 1
			end
			
			local nameSize
			if isBig then
				nameSize = 0.5
			elseif numColumns == 1 then
				nameSize = 0.7
			elseif numColumns == 2 then
				nameSize = 0.6
			else
				nameSize = 0.45
			end
			nameObject.Size = UDim2.new(nameSize, 0, 1, 0)
			nameObject.Position = UDim2.new(0, 0, 0, 0)
			statFrame.Size = UDim2.new(1-nameSize,0, 1,0)
			statFrame.Position = UDim2.new(nameSize,0, 0,0)

			nameObject.Parent = frame
			statFrame.Parent = frame
			
			local textChangers = {}
			local i = 1
			while i <= numColumns do
				local statColumn, changeText = createStatColumn(i, numColumns, isTeam, statFrame.BackgroundColor3)
				statColumn.Parent = statFrame
				table.insert(textChangers, changeText)

				i = i + 1
			end		
			
			return frame, statFrame, textChangers
		end

		local function createAlternatingRows(objects)
			for i, line in ipairs(objects) do
				if i % 2 == 0 then
					line.BackgroundTransparency = 1
				else
					line.BackgroundTransparency = 0.95
				end
			end
		end
		local removeFromTeam = nil

		local function clearTableEntry(obj, tableInfo)
			if tableInfo.MainObjectSmall then
				tableInfo.MainObjectSmall.Parent = nil
				tableInfo.MainObjectSmall = nil
			end
			if tableInfo.MainObjectBig then
				tableInfo.MainObjectBig.Parent = nil
				tableInfo.MainObjectBig = nil
			end
			if tableInfo.Connections then
				for i, connection in ipairs(tableInfo.Connections) do
					connection:disconnect()
				end
				tableInfo.Connections = nil
			end
			if tableInfo.LeaderStatConnections then
				for i, connection in ipairs(tableInfo.LeaderStatConnections) do
					connection:disconnect()
				end
				tableInfo.LeaderStatConnections = nil
			end
			if tableInfo.CurrentTeam then
				removeFromTeam(obj)
				tableInfo.CurrentTeam = nil
			end
			if tableInfo.Players then
				for i, player in ipairs(tableInfo.Players) do
					playerTable[player].CurrentTeam = nil
				end
				tableInfo.Players = {}
			end
			if tableInfo.StatValues then
				tableInfo.StatValues = nil
			end
		end
		
		local function resetPlayerTable()
			for player, info in pairs(playerTable) do
				clearTableEntry(player, info)
				playerTable[player] = nil
			end
			playerTable = {}
		end

		local function resetTeamTable()
			for team, info in pairs(teamTable) do
				clearTableEntry(team, info)
				teamTable[team] = nil
			end
			teamTable = {}
			teamColorTable = {}
		end

		local function getBoardTypeInfo()
			local isTeam  = (currentBoardType == "TeamScore" or currentBoardType == "TeamList")
			local isScore = (currentBoardType == "TeamScore" or currentBoardType == "PlayerScore")
			return isTeam, isScore
		end


		local function recomputeTeamScore(team, column)
			if not team or team == "Neutral" then
				return
			end
			
			local function recomputeScoreHelper(statChangers)
				if statChangers and column <= #statChangers then
					local sum = 0
					for i, p in ipairs(teamTable[team].Players) do
						if playerTable[p].StatValues and column <= #playerTable[p].StatValues then
							sum = sum + (playerTable[p].StatValues[column].Value or 0)
						end
					end
					statChangers[column](sum)
				end
			end

			recomputeScoreHelper(teamTable[team].StatChangersSmall)
			recomputeScoreHelper(teamTable[team].StatChangersBig)
		end
		local function recomputeCompleteTeamScore(team)
			local col = 1
			while col <= currentStatCount do
				recomputeTeamScore(team, col)
				col = col + 1
			end
		end
		removeFromTeam = function(player)
			if playerTable[player].CurrentTeam ~= nil then
				ArrayRemove(teamTable[playerTable[player].CurrentTeam].Players, player)
				recomputeCompleteTeamScore(playerTable[player].CurrentTeam)
				playerTable[player].CurrentTeam = nil
			end
		end

		local function assignToTeam(player)
			local isTeam, isScore = getBoardTypeInfo()

			if isTeam then
				local newTeam = nil

				if player.Neutral or teamColorTable[player.TeamColor.Name] == nil then
					newTeam = "Neutral"
				else
					newTeam = teamColorTable[player.TeamColor.Name] 
				end			

				if playerTable[player].CurrentTeam == newTeam then
					return
				end

				removeFromTeam(player)

				playerTable[player].CurrentTeam = newTeam
				table.insert(teamTable[newTeam].Players, player)
		
				if newTeam == "Neutral" then
					updatePlayerNameColor(player, nil)
				else
					updatePlayerNameColor(player, player.TeamColor)
				end
				
				recomputeCompleteTeamScore(newTeam)
				if sortPlayerListsFunction then
					sortPlayerListsFunction()
				end
			end
		end
		
		local function buildTeamObject(team, numStatColumns, suffix)
			local isTeam, isScore = getBoardTypeInfo()
			local teamObject = createTeamName(team.Name, team.TeamColor)
			if not teamTable[team] then
				teamTable[team] = {} 
			end
			teamTable[team]["NameObject" .. suffix] = teamObject
			if isScore then
				local statObject
				local textChangers
				teamObject, statObject, textChangers = createStatColumns(teamObject, numStatColumns, true, suffix == "Big")
				teamTable[team]["StatObject" .. suffix] = statObject
				teamTable[team]["StatChangers" .. suffix] = textChangers
			end
			teamTable[team]["MainObject" .. suffix] = teamObject
			if not teamTable[team].Players then
				teamTable[team].Players = {}
			end
			return teamObject
		end
		
		local currentContextMenuPlayer = nil
		local function updatePlayerContextMenu(player)
			currentContextMenuPlayer = player
			local elementHeight = 20
			local function highlight(button)
				button.Visible = false
				button.TextColor3 = Color3.new(0,0,0)
				button.BackgroundColor3 = Color3.new(0.8,0.8,0.8)
			end
			local function clearHighlight(button)
				button.Visible = false
				button.TextColor3 = Color3.new(1,1,1)
				button.BackgroundColor3 = Color3.new(0,0,0)
			end
			if playerContextMenu == nil then
				playerContextMenu = Instance.new("Frame")
				playerContextMenu.Name = "PlayerListContextMenu"
				playerContextMenu.BackgroundTransparency = 1
				playerContextMenu.Visible = false
			
				local playerContextMenuButton = Instance.new("TextButton")
				playerContextMenuButton.Name = "PlayerListContextMenuButton"
				playerContextMenuButton.Text = ""
				playerContextMenuButton.Style = Enum.ButtonStyle.RobloxButtonDefault
				playerContextMenuButton.ZIndex = 4
				playerContextMenuButton.Size = UDim2.new(1, 0, 1, -20)
				playerContextMenuButton.Visible = true
				playerContextMenuButton.Parent = playerContextMenu

				for i, contextElement in ipairs(contextMenuElements) do
					local element = contextElement
					if element.Type == "Button" then
						local button = Instance.new("TextButton")	
						button.Name = "ContextButton" .. i
						button.BackgroundColor3 = Color3.new(0,0,0)
						button.BorderSizePixel = 0
						button.TextXAlignment = Enum.TextXAlignment.Left
						button.Text = " " .. contextElement.Text
						button.Font = Enum.Font.Arial
						button.FontSize = Enum.FontSize.Size14
						button.Size = UDim2.new(1, 8, 0, elementHeight)
						button.TextColor3 = Color3.new(1,1,1)
						button.ZIndex = 4
						button.Parent = playerContextMenuButton
						button.MouseButton1Click:connect(function()
							if button.Active then
								local success, result = pcall(function() element.DoIt(currentContextMenuPlayer) end)
								playerContextMenu.Visible = false
							end
						end)
						
						button.MouseEnter:connect(function()
							if button.Active then
								highlight(button)
							end
						end)
						button.MouseLeave:connect(function()
							if button.Active then
								clearHighlight(button)
							end
						end)
						
						contextElement.Button = button
						contextElement.Element = button
					elseif element.Type == "Label" then
						local frame = Instance.new("Frame")
						frame.Name = "ContextLabel" .. i
						frame.BackgroundTransparency = 1
						frame.Size = UDim2.new(1, 8, 0, elementHeight)
		
						local label = Instance.new("TextLabel")	
						label.Name = "Text1"
						label.BackgroundTransparency = 1
						label.BackgroundColor3 = Color3.new(1,1,1)
						label.BorderSizePixel = 0
						label.TextXAlignment = Enum.TextXAlignment.Left
						label.Font = Enum.Font.ArialBold
						label.FontSize = Enum.FontSize.Size14
						label.Position = UDim2.new(0.0, 0, 0, 0)
						label.Size = UDim2.new(0.5, 0, 1, 0)
						label.TextColor3 = Color3.new(1,1,1)
						label.ZIndex = 4
						label.Parent = frame
						element.Label1 = label
					
						if element.GetText2 then
							label = Instance.new("TextLabel")	
							label.Name = "Text2"
							label.BackgroundTransparency = 1
							label.BackgroundColor3 = Color3.new(1,1,1)
							label.BorderSizePixel = 0
							label.TextXAlignment = Enum.TextXAlignment.Right
							label.Font = Enum.Font.Arial
							label.FontSize = Enum.FontSize.Size14
							label.Position = UDim2.new(0.5, 0, 0, 0)
							label.Size = UDim2.new(0.5, 0, 1, 0)
							label.TextColor3 = Color3.new(1,1,1)
							label.ZIndex = 4
							label.Parent = frame
							element.Label2 = label
						end
						frame.Parent = playerContextMenuButton
						element.Label = frame
						element.Element =  frame
					end
				end

				playerContextMenu.ZIndex = 4
				playerContextMenu.MouseLeave:connect(function() playerContextMenu.Visible = false end)
				robloxLock(playerContextMenu)
				playerContextMenu.Parent = PlayerlistScreenGui
				
			end
			
			local elementPos = 0
			for i, contextElement in ipairs(contextMenuElements) do
				local isVisible = false

				if contextElement.IsVisible then
					local success, visible = pcall(function() return contextElement.IsVisible(currentContextMenuPlayer) end)
					if success then 
						isVisible = visible
					else
						print("Error in IsVisible call: " .. visible)
					end
				end

				if contextElement.Type == "Button" then
					contextElement.Button.Visible = isVisible
					if contextElement.Button.Visible then
						isVisible = true
						clearHighlight(contextElement.Button)
						if contextElement.IsActive then
							local success, active = pcall(function() return contextElement.IsActive(currentContextMenuPlayer) end)
							if success then 
								contextElement.Button.Active = active
							else
								print("Error in IsActive call: " .. active)
							end
						end
						if contextElement.Button.Active then
							contextElement.Button.TextColor3 = Color3.new(1,1,1)
						else
							contextElement.Button.TextColor3 = Color3.new(0.7,0.7,0.7)
						end
					end
				elseif contextElement.Type == "Label" then
					contextElement.Label.Visible = isVisible
					if contextElement.Label.Visible then
						local success, text = pcall(function() return contextElement.GetText1(currentContextMenuPlayer) end)
						if success then
							contextElement.Label1.Text = " " .. text
						else
							print("Error in GetText1 call: " .. text)
						end

						if contextElement.GetText2 then
							local success, text = pcall(function() return contextElement.GetText2(currentContextMenuPlayer) end)
							if success then
								contextElement.Label2.Text = " " .. text
							else
								print("Error in GetText2 call: " .. text)
							end
						end
					end
				end
				if isVisible then
					contextElement.Element.Position = UDim2.new(0,-4, 0, elementPos * elementHeight - 4)
					elementPos = elementPos + 1
				end
			end
			playerContextMenu.Size = UDim2.new(0, 150, 0, elementPos*elementHeight + 13 + 20)
		end
		local function showPlayerMenu(player, x, y)
			updatePlayerContextMenu(player)
			x = x - (playerContextMenu.AbsoluteSize.X/2)
			if x + playerContextMenu.AbsoluteSize.X >= PlayerlistScreenGui.AbsoluteSize.X then
				x = PlayerlistScreenGui.AbsoluteSize.X - playerContextMenu.AbsoluteSize.X
			end
			playerContextMenu.Visible = true
			playerContextMenu.Position = UDim2.new(0, x, 0, y-playerContextMenu.AbsoluteSize.Y)
		end

		local function buildPlayerObject(player, numStatColumns, suffix)
			local isTeam, isScore = getBoardTypeInfo()

			local playerObject = nil
			local changePlayerNameFunction = nil
			local currentColor = nil
			if isTeam and not player.Neutral then
				currentColor = player.TeamColor.Color
			else
				currentColor = Color3.new(1,1,1)
			end
				playerObject, changePlayerNameFunction = createPlayerName(player.Name, player.MembershipType, currentColor, getFriendStatus(player))
			
			if not playerTable[player] then
				playerTable[player] = {}
			end
			if not playerTable[player].Connections then
				playerTable[player].Connections = {}
			end
			if not playerTable[player].CurrentTeam then
				playerTable[player].CurrentTeam = nil
			end
			playerTable[player]["NameObject" .. suffix] = playerObject
			playerTable[player]["ChangeName" .. suffix] = changePlayerNameFunction

			if isScore then
				local statObject = nil
				local textChangers = nil
				playerObject, statObject, textChangers = createStatColumns(playerObject, numStatColumns, false, suffix == "Big")
				playerTable[player]["StatObject" .. suffix]= statObject
				playerTable[player]["StatChangers" .. suffix] = textChangers
				
				local statValues, leaderstats = getStatValuesForPlayer(player)
				if not statValues or #statValues < numStatColumns then
					if not playerTable[player].LeaderStatConnections then
						playerTable[player].LeaderStatConnections = {}
					end
					if not leaderstats then
						table.insert(playerTable[player].LeaderStatConnections, 
							player.ChildAdded:connect(
								function(child)
									if child.Name == "leaderstats" then
										recreatePlayerFunction(player)
									else
										table.insert(playerTable[player].LeaderStatConnections, 
											child.Changed:connect(
												function(prop)
													if prop == "Name" and child.Name == "leaderstats" then
														recreatePlayerFunction(player)
													end
												end))
									end
								end))
					else
						table.insert(playerTable[player].LeaderStatConnections, 
							leaderstats.ChildAdded:connect(
								function(child)
									recreatePlayerFunction(player)
								end)
							)
						table.insert(playerTable[player].LeaderStatConnections, 
							leaderstats.AncestryChanged:connect(
								function(child)
									recreatePlayerFunction(player)
								end)
							)
					end
				end
				if statValues then

					if not playerTable[player].StatValues then
						playerTable[player].StatValues = {}
					end
					local pos = 1
					while pos <= numStatColumns and pos <= #statValues do
						local currentColumn = pos
						local statValue = statValues[pos]
						print(playerTable[player].StatValues)
						local statChanger = textChangers[pos]

						local updateStat = function(val)
							statChanger(tonumber(val) or 0)
							recomputeTeamScore(playerTable[player].CurrentTeam, currentColumn)
						end
						if pos > #playerTable[player].StatValues then
							table.insert(playerTable[player].StatValues, statValue)
						end

						table.insert(playerTable[player].Connections,
							statValue.Changed:connect(updateStat)
						)
						table.insert(playerTable[player].Connections,
							statValue.AncestryChanged:connect(
							function()
								recreatePlayerFunction(player)
							end)
						)
						updateStat(statValue.Value)
						pos = pos + 1
					end

				end
			end
			
			if supportFriends and player ~= game.Players.LocalPlayer and player.userId > 0 and  game.Players.LocalPlayer.userId > 0 then
				local button = Instance.new("TextButton")
				button.Name = playerObject.Name .. "Button"
				button.Text = ""
				button.Active = false
				button.Size = playerObject.Size
				button.Position = playerObject.Position
				button.BackgroundColor3 = playerObject.BackgroundColor3
				
				local secondButton = Instance.new("TextButton")
				secondButton.Name = playerObject.Name .. "RealButton"
				secondButton.Text = ""
				secondButton.BackgroundTransparency = 1
				secondButton.BackgroundColor3 = playerObject.BackgroundColor3
				local theNameLabel = playerObject:findFirstChild("NameLabel",true)
				if theNameLabel then

					theNameLabel.TextColor3 = Color3.new(1,1,1)
					secondButton.Parent = theNameLabel.FullNameLabel
				end
				secondButton.Parent.BackgroundTransparency = 1
				secondButton.Parent.Visible = true
				secondButton.ZIndex = 2
				secondButton.Size = UDim2.new(1,0,1,0)

				local previousTransparency = nil
				table.insert(playerTable[player].Connections,
					secondButton.MouseEnter:connect(
						function()
							if previousTransparency == nil then
								previousTransparency = secondButton.BackgroundTransparency
							end

							if lightBackground then
								secondButton.Parent.BackgroundTransparency = 0
							else
								secondButton.Parent.BackgroundTransparency = 1
							end
						end))
				table.insert(playerTable[player].Connections,
					secondButton.MouseLeave:connect(
						function()
							if previousTransparency ~= nil then
								if lightBackground then
								else
								end
								
								previousTransparency = nil
							end
							secondButton.Parent.BackgroundTransparency = 1
						end))
				
				local mouseDownX, mouseDownY
				table.insert(playerTable[player].Connections,
					secondButton.MouseButton1Down:connect(function(x,y) 
						mouseDownX = x
						mouseDownY = y
					end))
				table.insert(playerTable[player].Connections,
					secondButton.MouseButton1Click:connect(function() 
						showPlayerMenu(player, mouseDownX, secondButton.AbsolutePosition.Y + secondButton.AbsoluteSize.Y )
					end))
				playerObject.BackgroundTransparency = 1
				playerObject.Size = UDim2.new(1,0,1,0)
				playerObject.Position = UDim2.new(0,0,0,0)
				playerObject.Parent = button
				
				playerTable[player]["MainObject" .. suffix] = button
				
				playerObject = button
			else
				playerTable[player]["MainObject" .. suffix] = playerObject
		
			end
			table.insert(playerTable[player].Connections,
				player.Changed:connect(
					function(prop)
						if prop == "MembershipType" then
							updatePlayerName(playerTable[player]["NameObject" .. suffix], player.MembershipType, currentColor)
						elseif prop == "Name" then
							playerTable[player]["ChangeName" .. suffix](player.Name)
						elseif prop == "Neutral" or prop == "TeamColor" then
							assignToTeam(player)
						end
					end)
				)
			return playerObject
		end

		local function orderScrollList(scrollOrder, objectName, scrollFrame)
			local pos = 0
			local order = {}
			local isTeam, isScore = getBoardTypeInfo()
			for i, obj in ipairs(scrollOrder) do
				order[obj] = 0
			end

			if isTeam then
				local teams = getTeams()
				for i, team in ipairs(teams) do
					order[teamTable[team][objectName]] = pos 
					pos = pos + 1
					for i, player in ipairs(teamTable[team].Players) do
						if playerTable[player] then
							order[playerTable[player][objectName]] = pos
							pos = pos + 1
						end
					end
				end
				
				if #teamTable["Neutral"].Players > 0 then
					teamTable["Neutral"][objectName].Parent = scrollFrame
					order[teamTable["Neutral"][objectName]] = pos
					pos = pos + 1
					for i, player in ipairs(teamTable["Neutral"].Players) do
						order[playerTable[player][objectName]] = pos
						pos = pos + 1
					end
				else
					teamTable["Neutral"][objectName].Parent = nil
				end
			else
				local players = getPlayers()
				for i, player in ipairs(players) do
					order[playerTable[player][objectName]] = pos
					pos = pos + 1
				end	
			end

			table.sort(scrollOrder, 
				function(a,b) 
					return order[a] < order[b] 
				end)
		end
		

		local function createPlayerListBasics(frame, isBig)
			local headerFrame = Instance.new("Frame")
			headerFrame.Name = "Header"
			headerFrame.BackgroundTransparency = 1
			headerFrame.Size = UDim2.new(1,-13,0,26)
			headerFrame.Position = UDim2.new(0,0,0,0)
			headerFrame.Parent = frame

			local lowerPaneFrame = Instance.new("Frame")
			lowerPaneFrame.Name = "ScrollingArea"
			lowerPaneFrame.BackgroundTransparency = 1
			lowerPaneFrame.Size = UDim2.new(1,-3,1,-26)
			lowerPaneFrame.Position = UDim2.new(0,0,0,26)
			lowerPaneFrame.Parent = frame

			local scrollOrder = {}
			local scrollFrame, scrollUp, scrollDown, recalculateScroll = RbxGui.CreateScrollingFrame(scrollOrder)


			local scrollBar = Instance.new("Frame")
			scrollBar.Name = "ScrollBar"
			scrollBar.BackgroundTransparency = 0.9
			scrollBar.BackgroundColor3 = Color3.new(1,1,1)
			scrollBar.BorderSizePixel = 0
			scrollBar.Size = UDim2.new(0, 17, 1, -36)
			if isBig then scrollBar.Size = UDim2.new(0, 17, 1, -61) end
			scrollBar.Parent = lowerPaneFrame

			scrollFrame.Parent = lowerPaneFrame
			scrollUp.Parent = lowerPaneFrame
			scrollDown.Parent = lowerPaneFrame

			if isBig then
				scrollFrame.Position = UDim2.new(0,0,0,0)
				scrollUp.Position = UDim2.new(1,-41,0,5)
				scrollDown.Position = UDim2.new(1,-41,1,-35)
				scrollBar.Position = UDim2.new(1, -41, 0, 24)

				scrollFrame.Size = UDim2.new(1,-48,1,0)
				headerFrame.Size = UDim2.new(1,-20,0,32)
				
			else
				scrollBar.Position = UDim2.new(1, -19, 0, 14)
				scrollFrame.Position = UDim2.new(0,1,0,0)
				scrollUp.Position = UDim2.new(1,-19,0,-5)
				scrollDown.Position = UDim2.new(1,-19,1,-20)
				
				lowerPaneFrame.Position = UDim2.new(0,0,0,30)

				local toggleScrollBar = function(visible)
					if visible then
						scrollFrame.Size = UDim2.new(1,-16,1,0)
						headerFrame.Size = UDim2.new(1,-16,0,32)
					else
						scrollFrame.Size = UDim2.new(1,0,1,0)
						headerFrame.Size = UDim2.new(1,5,0,32)
					end
					scrollUp.Visible = visible
					scrollDown.Visible = visible
					scrollBar.Visible = visible
				end
				scrollUp.Changed:connect(function(prop) 
					if prop == "Active" then
						toggleScrollBar(scrollUp.Active or scrollDown.Active)
					end
				end)

				scrollDown.Changed:connect(function(prop) 
					if prop == "Active" then
						toggleScrollBar(scrollUp.Active or scrollDown.Active)
					end
				end)

				toggleScrollBar(scrollUp.Active or scrollDown.Active)
			end
			return headerFrame, scrollFrame, recalculateScroll, scrollOrder
		end
		
		
				
		createBoardsFunction = function (boardType, numStatColumns)
			print("Create Boards")
			local smallFrame = Instance.new("Frame")
			smallFrame.Name = "SmallPlayerlist"
			smallFrame.Position = smallWindowPosition
			smallFrame.Active = false
			smallFrame.Size = smallWindowSize
			smallFrame.BackgroundColor3 = Color3.new(0,0,0)
			smallFrame.BackgroundTransparency = 0.7
			smallFrame.BorderSizePixel = 0

			local bigFrame = Instance.new("Frame")
			bigFrame.Name = "BigPlayerlist"
			bigFrame.Size = bigWindowSize
			bigFrame.Position = bigWindowPosition
			bigFrame.BackgroundColor3 = Color3.new(0,0,0)
			bigFrame.BackgroundTransparency = 0.7
			bigFrame.BorderSizePixel = 0
			bigFrame.Visible = false		
			
			local bigFrameWrapper = Instance.new("Frame")
			bigFrameWrapper.Name = "Expander"
			bigFrameWrapper.Size = UDim2.new(1,21,1,16)
			bigFrameWrapper.Position = UDim2.new(0, 0, 0,0)
			bigFrameWrapper.BackgroundTransparency = 1
			bigFrameWrapper.Parent = bigFrame

			local smallHeaderFrame, scrollFrameSmall, recalculateScrollSmall, scrollOrderSmall = createPlayerListBasics(smallFrame, false)
			local bigHeaderFrame, scrollFrameBig, recalculateScrollBig, scrollOrderBig = createPlayerListBasics(bigFrameWrapper, true)
			
			
		local function fixPlayerlistSize(size)
			
		local newSize = size
		if newSize >= 16 then
			newSize = 16
		end	
			
		smallFrame.Size = UDim2.new(1,1,0,31 + (newSize * 20))	
			
		end
				scrollFrameSmall.ChildAdded:connect(function()
			fixPlayerlistSize(#scrollFrameSmall:GetChildren())
			end)
			scrollFrameSmall.ChildRemoved:connect(function()
			fixPlayerlistSize(#scrollFrameSmall:GetChildren())
			end)
			
			local playerListButton = Instance.new("ImageButton")
			playerListButton.Name = "GoBigButton"
			playerListButton.BackgroundTransparency = 1
			playerListButton.Image = "rbxasset://textures/ui/playerlist_small_maximize.png"
			playerListButton.Size = UDim2.new(0.0, 35, 0, 29)
			playerListButton.Position = UDim2.new(0, 0, 0, 0)
			playerListButton.MouseButton1Click:connect(
				function()
					toggleBigWindow()
				end)
			playerListButton.Parent = smallHeaderFrame

			playerListButton = Instance.new("ImageButton")
			playerListButton.Name = "CloseButton"
			playerListButton.BackgroundTransparency = 1
			playerListButton.Image = "rbxasset://textures/ui/playerlist_small_hide.png"
			playerListButton.Size = UDim2.new(0.0, 38, 0, 29)
			playerListButton.Position = UDim2.new(0, 35, 0, 0)
			playerListButton.MouseButton1Click:connect(
				function()
					transitionWindowsFunction("None")
				end)
			playerListButton.Parent = smallHeaderFrame

			playerListButton = Instance.new("ImageButton")
			playerListButton.Name = "CloseButton"
			playerListButton.Image = "rbxasset://textures/ui/playerlist_big_hide.png"
			playerListButton.BackgroundTransparency = 1
			playerListButton.Size = UDim2.new(0.0, 29, 0, 29)
			playerListButton.Position = UDim2.new(1, -30, 0.5, -15)
			playerListButton.MouseButton1Click:connect(
				function()
					toggleBigWindow()
				end)
			playerListButton.Parent = bigHeaderFrame

			local placeName = Instance.new("TextLabel")
			placeName.Name = "PlaceName"
			placeName.Text = " Player List"
			placeName.FontSize = Enum.FontSize.Size24
			placeName.TextXAlignment = Enum.TextXAlignment.Left
			placeName.Font = Enum.Font.ArialBold
			placeName.BackgroundTransparency = 1
			placeName.TextColor3 = Color3.new(1,1,1)
			placeName.Size = UDim2.new(0.5, 0, 1, 0)
			placeName.Position = UDim2.new(0, 0, 0.0, 0)
			placeName = RbxGui.AutoTruncateTextObject(placeName)
			placeName.Parent = bigHeaderFrame
			

			currentBoardType = boardType
			currentStatCount = numStatColumns
			local isTeam, isScore = getBoardTypeInfo()
			local players = getPlayers()
			
			if isScore then
				local statColumns = getStatColumns(players)
				numStatColumns = #statColumns
				if numStatColumns > 3 then
					numStatColumns = 3
				end
				createStatHeaders(statColumns, numStatColumns, false).Parent = smallHeaderFrame
				createStatHeaders(statColumns, currentStatCount, true).Parent = bigHeaderFrame
			end
			resetPlayerTable()
			
			
			
			for i, player in ipairs(players) do
				local playerObject = buildPlayerObject(player, numStatColumns, "Small")
				table.insert(scrollOrderSmall, playerObject)
				playerObject.Parent = scrollFrameSmall

				playerObject = buildPlayerObject(player, currentStatCount, "Big")
				table.insert(scrollOrderBig, playerObject)
				playerObject.Parent = scrollFrameBig
			end
			resetTeamTable()

			local teamStatObjects = {}
			if isTeam then
				local teams = getTeams()
				local i = #teams
				while i >= 1 do
					local team = teams[i]
					teamColorTable[team.TeamColor.Name] = team
					i = i - 1
				end 
				for i, team in ipairs(teams) do
					local teamObject = buildTeamObject(team, numStatColumns, "Small")
					table.insert(scrollOrderSmall, teamObject)
					teamObject.Parent = scrollFrameSmall


					teamObject = buildTeamObject(team, currentStatCount, "Big")
					table.insert(scrollOrderBig, teamObject)
					teamObject.Parent = scrollFrameBig
				end
				
				

				teamTable["Neutral"] = {}
				teamTable["Neutral"].Players = {}

				local neutralTeamObject = createTeamName("Neutral", BrickColor.palette(8))
				teamTable["Neutral"].NameObjectSmall = neutralTeamObject
				teamTable["Neutral"].StatObjectSmall = nil
				teamTable["Neutral"].MainObjectSmall = neutralTeamObject
				table.insert(scrollOrderSmall, neutralTeamObject)

				neutralTeamObject = createTeamName("Neutral", BrickColor.palette(8))
				teamTable["Neutral"].NameObjectBig = neutralTeamObject
				teamTable["Neutral"].StatObjectBig = nil
				teamTable["Neutral"].MainObjectBig = neutralTeamObject
				table.insert(scrollOrderBig, neutralTeamObject)

				local neutralPlayers = {}
				for i, player in ipairs(players) do
					assignToTeam(player)
				end
			end



			removePlayerFunction = function(player)
				if playerTable[player] then
					ArrayRemove(scrollOrderSmall, playerTable[player].MainObjectSmall)
					ArrayRemove(scrollOrderBig, playerTable[player].MainObjectBig)

					clearTableEntry(player, playerTable[player])
		
					playerTable[player] = nil
				end
			end
			recreatePlayerFunction = function(player)
				removePlayerFunction(player)

				local playerObject = buildPlayerObject(player, numStatColumns, "Small")
				table.insert(scrollOrderSmall, playerObject)
				robloxLock(playerObject)
				playerObject.Parent = scrollFrameSmall

				playerObject = buildPlayerObject(player, currentStatCount, "Big")
				table.insert(scrollOrderBig, playerObject)
				robloxLock(playerObject)
				playerObject.Parent = scrollFrameBig
				
				local isTeam, isScore = getBoardTypeInfo()
				if isTeam then
					assignToTeam(player)
				end

				sortPlayerListsFunction()
			end

			sortPlayerListsFunction = function()
				orderScrollList(scrollOrderSmall, "MainObjectSmall", scrollFrameSmall)
				recalculateScrollSmall()
				createAlternatingRows(scrollOrderSmall)

				orderScrollList(scrollOrderBig, "MainObjectBig", scrollFrameBig)
				recalculateScrollBig()
				createAlternatingRows(scrollOrderBig)
			end

			sortPlayerListsFunction()

			robloxLock(smallFrame)
			robloxLock(bigFrame)
			return smallFrame, bigFrame
		end	
		local function teamsChanged()
			if debounceTeamsChanged then 
				return 
			end

			debounceTeamsChanged = true
			wait()
			rebuildBoard(PlayerlistScreenGui, determineBoardType())
			debounceTeamsChanged = false
		end

		
		local checkIfBoardChanged = function()
			local newBoardType, numStats = determineBoardType()
			if newBoardType ~= currentBoardType or numStats ~= currentStatCount then
				rebuildBoard(PlayerlistScreenGui, newBoardType, numStats)
			end
		end

		local function buildPlayerList()
			waitForChild(game, "Players")
			waitForProperty(game.Players, "LocalPlayer")

			playerListEnabled = true
			if not playerListEnabled then
				return
			end
			
			supportFriends = false
			
			local teams = game:GetService("Teams")
			if teams then
				local teamConnections = {}

				teams.ChildAdded:connect(
					function(child)
						if child:IsA("Team") then
							teamsChanged()
							teamConnections[child] = child.Changed:connect(
								function(prop)
									if prop == "TeamColor" or prop == "Name" then
										teamsChanged()
									end
								end)
						end
					end)
				teams.ChildRemoved:connect(
					function(child)
						if child:IsA("Team") then
							if teamConnections[child] then
								teamConnections[child]:disconnect()
								teamConnections[child] = nil
							end
							teamsChanged()
						end
					end)
			end

			game.Players.ChildAdded:connect(
				function(player)
					if player:IsA("Player") then
						addPlayerFunction(player)
					end
				end)

			game.Players.ChildRemoved:connect(
				function(player)
					if player:IsA("Player") then
						if removePlayerFunction then
							removePlayerFunction(player)
						end
					end
				end)

			rebuildBoard(PlayerlistScreenGui, determineBoardType())

			

			delay(0,
				function()
					while true  do
						wait(5)
						checkIfBoardChanged()
					end
				end)
		end
			buildPlayerList()
			transitionWindowsFunction("Small")
	end