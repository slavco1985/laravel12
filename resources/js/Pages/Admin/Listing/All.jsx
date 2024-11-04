import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import { useForm, Link } from '@inertiajs/react';
import { usePrevious } from '@/Core/Previous';
import Pagination from '@/Core/Pagination'
import Swal from 'sweetalert2';
import { router } from '@inertiajs/react';
import pickBy from 'lodash/pickBy';

let per_page = 0;

const All = (props) =>{

    const [listing, setListing] = useState(props.listing.data);
    const [category, setCategory] = useState(props.category);
    const [city, setCity] = useState(props.city);
    const [links, setLinks] = useState(props.listing.links);
    const [activepage, setActivePage] = useState('');
    const [perpage, setPerpage] = useState('');
    

    const { data, setData, get, processing, errors, clearErrors, reset, delete: destroy } = useForm({
        fcat : props.request.fcat || '',
        frating : props.request.frating || '',
        fcity :  props.request.fcity || '',
        fkey : props.request.fkey || '',
       
    })
   

    const prevValues = usePrevious(data);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.value);
    }

    useEffect(() => {
        if (prevValues) {
            get(route('admin/view-all-listing'),{
                preserveState: false,
            });
        }
    }, [data.fcat, data.frating, data.fcity]);

    useEffect(() => {
        if (prevValues) {
            const query = Object.keys(pickBy(data)).length ? pickBy(data) : { remember: 'forget' };
            router.get(route(route().current()), query, {
                replace: true,
                preserveState: true
            });
        }
    }, [data.fkey]);

    useEffect(()=>{
        if(props.update != 'noupdate'){
            setListing(props.listing.data);
            setLinks(props.listing.links);
        }
        
        props.listing.links && props.listing.links.map((l)=>{
            if(l.active){
               // setData('page', l.label);
                setActivePage(parseInt(l.label));
            }
        })
        setPerpage(props.listing.per_page);
        
    },[props.listing])

    const updateFeatured = i =>() =>{
        listing[i].featured = !listing[i].featured;
        router.put(route('update-listing-featured', listing[i]),{
            preserveState:  true,
        });
    }

    const removeListing = id => () => {
        Swal.fire({
            title: 'Are you sure want to Delete?',icon: 'warning',showCancelButton: true, confirmButtonText: 'Yes, delete!'
          }).then((result) => {
            if (result.isConfirmed) {
                destroy(route('listing.destroy', id),{
                    onSuccess: () => {
                        setListing((ps)=>{
                            return ps.filter(loc => loc.id != id);
                        })
                        Swal.fire('Deleted!','Listing Removed Successfully','success');
                    },
                    preserveState:true
                });
            }
          })
    }



    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <div className="row">
                <div className="col-md-6">
                    <PageTitle title="View All Listing" path="Listing" pathurl="" />
                </div>
                <div className="col-md-6 text-end">
                    <a href={route('business-excel-download', data)} data={data}>
                        <button className="btn btn-outline-primary">Excel Download</button>
                    </a>
                   
                </div>
            </div>
            
            <Panel title="View Listing" md="12">
                <div className="row pt-2 pb-2 form-group m-0">
                    <div className="col-md-3 pe-1">
                        <select className='form-control' value={data.fcat} onChange={onHandleChange} name="fcat" id="">
                            <option value=''>Select Category</option>
                        {
                             category  && category.map((c, i)=>{
                                 return <option  key={i} value={c.id}>{c.name}</option>
                             })
                        }
                        </select>
                    </div>
                    <div className="col-md-3 pe-1">
                        <select className='form-control' value={data.fcity} onChange={onHandleChange} name="fcity" id="">
                            <option value=''>Filter by City</option>
                            {
                             city  && city.map((c, i)=>{
                                 return <option  key={i} value={c.id}>{c.name}</option>
                             })
                        }
                        </select>
                    </div>
                    <div className="col-md-3 pe-1">
                        <select className='form-control' value={data.frating} onChange={onHandleChange} name="frating" id="">
                            <option value="">Filter by Rating</option>
                            <option value="1">1 Star</option>
                            <option value="2">2 Star</option>
                            <option value="3">3 Star</option>
                            <option value="4">4 Star</option>
                            <option value="5">5 Star</option>
                        </select>
                    </div>
                    <div className="col-md-3">
                        <input name='fkey' onChange={onHandleChange} value={data.fkey} placeholder='Search Business' type="text" className='form-control' />
                    </div>
                </div>
                <div className="table-responsive-md">
                    <table className='table mb-0'>
                        <tbody>
                            <tr>
                                <th className='slno text-center'>#</th>
                                <th>Image</th>
                                <th>Business Name</th>
                                <th>User</th>
                                <th className='center'>Featured</th>
                                <th className='center'>City</th>
                                
                                <th className='center'>Active Plan</th>
                                <th className='center'>Rating</th>
                                <th className='text-center'>Action</th>
                            </tr>
                            
                            {
                                listing && listing.map((l, i)=>{
                                return <tr key={i}>
                                            <td className='center'>{i + props.listing.from}</td>
                                            <td style={{maxWidth:'80px'}}>
                                                <img style={{width:'50px'}} src={l.image} alt="" />
                                            </td>
                                            <td>
                                                {l.business_name} <br />
                                                <small>{l.email}</small>
                                            </td>
                                            <td>{ l.user }</td>
                                            <td className='center'>
                                                {
                                                    l.featured == 0 ? 
                                                        <i onClick={updateFeatured(i)} className="bi text-primary fs-4 bi-toggle-off"></i> 
                                                    : 
                                                        <i onClick={updateFeatured(i)} className="bi text-primary fs-4 bi-toggle-on"></i>
                                                }
                                            </td>
                                            <td className='center'>{ l.city }</td>
                                            <td className='center'>{ l.plan }</td>
                                            <td className='center'>{ l.rating ? l.rating : 'No' } Star</td>
                                            <td className='text-center'>
                                                <button onClick={removeListing(l.id)} className="btn btn-danger me-2 btn-xs"><i className="bi bi-trash3"></i></button>
                                                <a href={route('listing.edit', l.id)}>
                                                <button className="btn btn-primary me-2 btn-xs"><i className="bi bi-pencil-square"></i></button>
                                                </a>
                                                
                                                <a target='_blank' href={route('view', l.url)} className="btn btn-success btn-xs"><i className="bi bi-eye"></i></a>
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
export default All

