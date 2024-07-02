Laravel 10 course by Merryjoy

# breeze
# Socialite

##  Project 

1. User can create a new help ticket
2. Admin can reply on help tecket
3. Admin can reject or solve the ticket
4. When admin update on the ticket then user will get one notification via email that ticket status is updated
5. User can give ticket title and description
6. User can uppload a document like pdf or image

## Table Structure
1. Tickets - 
    title (string), {required}
    description (text),  {required}
    status (open { default } ,resolve,rejected), 
    attachements (string), {nullable}
    user_id (int) , 
    status_change_by_id (int), ts(timestamp)
2. Replies - 
    body(text) , 
    user_id(int) , 
    ticket_id(int) , 
    ts(timestamp)
3. 