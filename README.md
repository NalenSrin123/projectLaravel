Table:
    user:{
        -userID (int,not null,PK)
        -username(varchar 255)
        -email(varchar 255)
        -password(varchar 255)
        -profile(varchar 255)
    }
    logo{
        -userID(int,not null,PK)
        -thumbnail(varchar 255)
    }
    category{
        -cateID(int, not null,PK)
        -name(varchar 255)
    }
    product{
        -proID(int not null,PK)
        -user_id(int,FK)
        -cate_id(int,FK)
        -proName(varchar 255)
        -regular_price(float)
        -sale_price(float)
        -qty(int)
        -color(varchar 255)
        -size(varchar 255)
        -thumbnail(varchar 255)
        -description(text)
        -views(int)
    }



    
   


        


