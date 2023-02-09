# COSC 360 – Project Proposal
---
Group Members:
| Name     | Student ID |
| ----------- | ----------- |
| Aidan Murphy      | 10967677       |
| Zachery Prenovost   | 23286388        |
---
## project description
This repository contains a website built using the LAMP stack: Linux, Apache, MySQL, PHP; which will allow us to incorporate all elements of a traditional website, including database access, and separation of front and back end. It will be a message board website similar to Reddit/Twitter, where users can engage in discussion online by making posts or making comments on other posts. Administrators will have greater control over particular aspects of the website including moderation of user posts and comments.
## stack/dependency install instructions
<work in progress>
## General Website Requirements
- Original styling on all pages using bootstrap
- 2 or 3 column layout with components responsive to user input 
- Variable display size
- Forms will be validated with JavaScript (JS)
- Server-side/backend scripting with PHP
- MySQL relational database to store information
- Security measures to prevent ‘attacks’
- Maintain user state across different session
- Automatic updates for viewers (no page refresh required)
- User profile customisation
- Groups to post discussion topics under (have some general pages)
- Implement breadcrumb strategy into navigation, and have error handling to prevent multiple form submissions and navigation into restricted areas


## Requirements by user group 
### New User Registration:
- Users should be able to register for accounts on the website, registration will include name, email, and image.
- Users will be able to sign in to their accounts once registered with a username and password


### Registered Users:
- Registered users will be able to post new discussions
- Registered users will be able to comment on discussion posts
- Users are required to be able to view/edit their profile
- Users are able to  recover password via email


### All Users:
- All users (even unregistered) will be able to see discussions that are posted by other users as well as comments on these discussions
- All users will be able to search for discussions based on keyword search


### Administrators:
- Administrators will be able to search for user by name, email or post
- Administrators will be able to enable/disable users
- Administrators will be able to edit/remove posts
