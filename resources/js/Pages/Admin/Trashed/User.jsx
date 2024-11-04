import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Pagination from '@/Core/Pagination';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';
const User = (props) =>{

    const [users, setUsers] = useState(props.users.data);
    const [links, setLinks] = useState(props.users.links);
    const [activepage, setActivePage] = useState('');

    useEffect(()=>{
        props.users.links && props.users.links.map((l)=>{
            if(l.active){
                setActivePage(parseInt(l.label));
            }
        })
    },[props.users])

    const restoreUser = id => () =>{
        Swal.fire({
            title: 'Are you sure want to Restore?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, Restore!'
          }).then((result) => {
            if (result.isConfirmed) {
                router.delete(route('restore-user', id),{
                    onSuccess: () => {
                        setUsers((user)=>{
                            return user.filter(user => user.id != id);
                        })
                        Swal.fire('Restored!','User Restored Successfully','success');
                    },
                    preserveState:true
                });
            }
          })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="View Trashed Users" path="Trashed" pathurl="" />
            <Panel title="Manage Trashed Users" md="12">
            <div className="table-responsive-md">
                <table className='table table-responsive mb-0'>
                        <tbody>
                        
                            <tr>
                                <th className='slno text-center'>#</th>
                                <th>Image</th>
                                <th>User Name</th>
                                <th>Email Address</th>
                                <th className='text-center'>Mobile Number</th>
                                <th className='center'>Active Plan</th>
                                <th className='text-center'>Action</th>
                            </tr>
                            {
                                users && users.map((u, i)=>{
                                    return <tr key={i}>
                                        <td className='text-center'>{i +  activepage * props.users.per_page - 1}</td>
                                        <td><img className='rounded' style={{width:'40px'}} src="./../../assets/admin/images/person.jpg" alt="" /></td>
                                        <td>{u.name}</td>
                                        <td>{u.email}</td>
                                        <td className='text-center'>{u.mobile}</td>
                                        <td className='text-center'>{u.plan}</td>
                                        <td className='text-center'>
                                            <button onClick={restoreUser(u.id)} className="btn btn-primary me-2 btn-xs"><i className="bi bi-recycle"></i> Restore</button>
                                        </td>
                                    </tr>
                                })
                            }
                        
                        </tbody>
                    </table>
            </div>
                { links.length === 3 ? '' :
                   <div className="card-footer">
                        <div className="row">
                            <div className="col-md-6 pt-2">
                                
                            </div>
                            <div className="col-md-6">
                                <Pagination links={links} />
                            </div>
                        </div>
                        
                    </div>
                }
            </Panel>
        </Authenticated>
    )
}
export default User