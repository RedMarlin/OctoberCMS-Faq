# OctoberCMS-Faq
Interactive Faq System for OctoberCMS that lets your visitors submit questions directly on your page.

###Features###
* Add & Edit  Q/A in the backend
* Category admin for  Q/A
* Interactive questions (visitors can ask questions directly on the page)
* Email notifications: question being asked, question being answered
* Show featured Q/A
* List Q/A for given category
* List newest  Q/A 
* List all Q/A from all categories
* Choose order of questions for FaqList component
  
This plugin is limited but I plan on developing it in the future.  
If you would like to have a specific feature please issue a ticket on github (Support Tab)  
  
###TODO list###
* Component for listing categories links
* Component for listing random/newest Question links

  

##Installation##
Install the plugin from the marketplace directly. Go to October *Backend  Settings->Updates->Install Plugins*  
Type *RedMarlin.Faq* and install the plugin.  
  
You can also download the plugin directly from the [Github](https://github.com/RedMarlin/OctoberCMS-Faq/archive/master.zip)    
Unpack it to *plugins/redmalin/faq* directory. Logout and login into the backend, and the plugin should be installed now.  
  
##Configuration##
There is not much to configure, all the settings for backend display are in components.  
  
The plugin also creates 2 mail templates  
* **Redmarlin.faq:mail.asked** - Admin notification when somebody ask a question
* **Redmadlin.faq:mail.replied** - Notify the visitor that his question was answered.
  
Go to *Settings->Mail->Mail Templates* to edit them.  
  
For available variables list check the *Documentation* tab.  

##Some default behaviors to have in mind##
* All questions asked through the site are automatically added as Not public (invisible on the site) also the category is set to 0.
* Email notifications for answered questions are not automatically you need to click on the button after saving the answer.
* Email left by visitor to be notified is deleted from DB once the notification is send


##Usage##
You can use this plugins in two ways. You can add questions and answers yourself (disabling the visitors questions) or you can let your customers ask the questions and you answer them from admin.   
  
To let your visitors ask questions just add the **FaqAsk** component to a page.  
  
To add questions and answers you first need to create a category. For adding questions and aswners and categories go to FAQ top menu.  
  
To make questions visible on the page you need to turn on **Is Public** switch.
  
You can also feature a Q/A by turning on **Is Featured** switch.  
  
To notify you visitor about answer being published to his question first save the answer and then click on **"Notify about answer"** box. The notification will be send and email will be deleted form the DB. This prevents storing your visitors emails forever and sending twice the notification.  

To sort questions for given category go to the category menu and then edit category. Click on the **Reorder Questions in this category** button.


  
##Components##

##FaqAsk##
Displays a form on your page that lets your visitors ask the question directly.

There are no properties for this one just add it to your page and then insert the component

####Example Usage####
Displaying Ask a question form in right column.
```
[FaqAsk]
==
<div id="contact-column-right" >
           <div id="faq-question-column">
                <h2>Ask a question </h2>
                {% component 'FaqAsk' %}
        </div>
</div>
```
  
  
##FaqFeatured##
Displays list of Q titles with links to Faq Page.

####Properties####
* **featuredNumber** - The number of features Q to show

####Example usage####
Displaying Featured Question list in footer.
```
[FaqFeatured]
featuredNumber = 10
==
 <footer>
   <div>
       {% component 'FaqFeatured' %}
  </div>
</footer>
```
  
  
##FaqLast##
Displays list of newest questions with answers from all categories.

####Properties####
* **questionNumber** - Number of newest Q/A to show.

The default template contains div element with specially generated id to be an anchor for **FaqFeatured** component links.
```
<div id="question_{{ faq.id }}">
```

####Usage Example####
Show 10 newest Q/A on page.
```
[FaqLast]
questionNumber = 10
==
 <div>
  <h2>Latest Questions</h2>
   {% component 'FaqLast' %}
 </div>
```
  
  
##FaqList##
Displays list of Q/A from given category. 

####Properties####
* **categoryId** - Id of the category you want to show Q/A from
* **sortOrder** - Choose order of questions. Asc - Older first, Desc - Newer first, order - User Order (Choosen in backend)

####Usage example####
Page that lets you display all Q/A for given category. You can set category in URL. ie *faq/cartegory/1* will show all Q/A for category with id 1 (you can check category id in the backend in the Category list.)
```
url = "/faq/category/:catid"

[FaqList]
categoryId = {{ :catid }}
==
<div>
   <h2 class="green-sec center">{{ category }}</h2>
   <p>Please feel free to browse Frequently asked questions in this</p>
   {% set faqs = FaqList.faqs %}
        <ul>
 	     {% for faq in faqs %}
            <li>
		<div id="question_{{ faq.id }}">
	        	<h3>Q: {{ faq.question }}</h3>
			<span>{{ faq.created_at|date("d-m-Y")}}</span>
			<span>{{ faq.answer|md }} </span>	
		</div>
	</li>
 	{% endfor %}
    </ul>
</div>
```
##FaqAll##
Displays list of Q/A from all categories. 

####Properties####
* **limit** - limit list to X entries
* **sortOrder** - Choose order of questions. Asc - Older first, Desc - Newer first, order - User Order (Choosen in backend)

####Usage example####
Page that lets you display 25 last Q/A from all categories. If you need to show more questions just set limit to something big enough, like 999.
```
[FaqAll]
limit = 25
==
 <div>
  <h2>Questions</h2>
   {% component 'FaqAll' %}
 </div>
```  

If you have any questions just Ask!  
 You can contact us on:
* [October Marketplace](http://octobercms.com/author/RedMarlin)
* [Redmarlin Page](http://redmarlin.net/contact)

