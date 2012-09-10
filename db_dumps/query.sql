-- Golf Hotlist
select r.first_name,r.last_name,r.email,r.zip,r.handicap,
r.rounds,r.vacations,r.rcv_emails,r.rcv_offers,
r.date_created,l.city, l.event_date from 
registrations r
join locations l
on l.id = r.location_id
where r.email not like ('scottrenick@dolphinmicro.com')
and r.email not like ('ericscott@dolphinmicro.com')
and r.email not like ('coopermcgoodwin@dolphinmicro.com')

-- Fantasy Golf

select email, first_name, last_name, tel as phone, optin1, created_at, updated_at, sign_in_count
from users

