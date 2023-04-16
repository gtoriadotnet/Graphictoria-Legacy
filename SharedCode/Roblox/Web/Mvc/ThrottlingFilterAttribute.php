<?php

// This file defines the Roblox.Web.Mvc.ThrottlingFilterAttribute class. Originally housed in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Web\Roblox.Web.Mvc\FilterAttributes\ThrottlingFilterAttribute.cs.

namespace Roblox\Web\Mvc;

class ThrottlingFilterAttribute {
	
	function __construct() {
	}
	
	function OnActionExecuting(/*ActionExecutingContext*/ $filterContext) {
		/*
			at Roblox.Web.Mvc.ThrottlingFilterAttribute.VerifyRequestThrottling(ActionExecutingContext filterContext) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Web\Roblox.Web.Mvc\FilterAttributes\ThrottlingFilterAttribute.cs:line 44
			at Roblox.Web.Mvc.ThrottlingFilterAttribute.OnActionExecuting(ActionExecutingContext filterContext) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Web\Roblox.Web.Mvc\FilterAttributes\ThrottlingFilterAttribute.cs:line 31
		*/
	}
	
	function VerifyRequestThrottling(/*ActionExecutingContext*/ $filterContext) {
		/*
			at Roblox.Web.WebThrottlingManager.IsRequestAllowed(List`1 requestsForCurrentContext, DateTime executionDateTime, RequesterType requester, String actionName) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Web\Roblox.Web\Throttling\WebThrottlingManager.cs:line 129
			at Roblox.Web.Mvc.ThrottlingFilterAttribute.OnActionExecuting(ActionExecutingContext filterContext) in C:\teamcity-agent\work\a6371342c4f9b6ec\Assemblies\Web\Roblox.Web.Mvc\FilterAttributes\ThrottlingFilterAttribute.cs:line 31
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeActionMethodFilter(IActionFilter filter, ActionExecutingContext preContext, Func`1 continuation)
			at System.Web.Mvc.ControllerActionInvoker.InvokeAction(ControllerContext controllerContext, String actionName)
		*/
	}
}

// EOF