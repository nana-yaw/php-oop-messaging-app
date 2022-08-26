# Job Skill Assessment Test
## Thank you for your interest in our job offering. Part of our hiring process is a coding skills test.

## Please refer to the accompanying email for which programming language to use.

What do we expect from you?
Use OOP
If you understand the S.O.L.I.D. principle, please use it, that's a big plus
We prefer quality over quantity, meaning: it is better to submit a quality coded un-fished task than a finished task with spaghetti code.
Use GIT as VCS
Your final code does not need to have a "fancy" styled output. You can use the console or a webpage for the output. Unit tests would be the best choice. Basically, provide us a simple way to see your code in action.
What do we want you to build?
You need to code the core structure for a messaging app.

This messaging app has 3 different user types: Student, Teacher and Parent

Each user type should have:

User ID (required)
First name (required)
Last name (required)
Email (required)
Profile Photo (optional)
Difference between user types:

Teachers and Parents have Salutation (optional), it's used in the field "full name".
Teachers can send messages to any user type
Parents and Students can send message only to Teachers
After initialising the user object we need to have following options:

user object needs to have an option to get the full name.
For Students full name is combined from: first name + last name.
For Teachers and Parents is built from: salutation + first name + last name.
We need a way to get the profile picture. If there is no profile picture when initialising the user object, we need to get the path/url to a default avatar.
Get email
Get user id.
We need a process to save the user. On save we need to validate email and profile picture. As this is only test, for the profile picture do not make a complex validation, only check if the passed string ends with .jpg, if not save should fail.
Also, this save feature does not need to actually save the user, instead it should only return success if validation passed, and fail if not.
Each message needs to have (all required):

Sender
Receiver
Message text
Creation time (Unix time format)
Message type: System or Manual
For each message we want to have the following features

System messages can only be sent from Teachers and only to Students.
Process to get full name of sender and receiver
Process to get message text
Process to get message type
Formatted creation time
Process to save the message. Here the same as for saving a user, we don't need the actual saving, we just need to see the validation process.
For example, if we create a new message instance and we set Student as sender, but we also set message type to System, the save message process should fail since only Teachers can send System messages.
How should the final code look like?
We don't want you to implement database or some other data storage provider.

We want to see the code where you/we can create new object instances and pass hard-coded data just for tests. If coded properly, you should be able to easily connect your code with a DB.