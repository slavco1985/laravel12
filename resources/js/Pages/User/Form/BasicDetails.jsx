import React, { useState, useEffect } from 'react';
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';
import { MultiSelect } from 'react-multi-select-component';
import Swal from 'sweetalert2';

const BasicDetails = (props) =>{
   
    const [category, setCategory] = useState(props.category);
    const [location, setLocation] = useState(props.location);
    const [listing, setListing] = useState(props.listing);
  

    const { data, setData, post, put, processing, errors, reset, clearErrors } = useForm({
        business_name: listing.business_name || '',
        description: listing.description || '',
        category: listing.select || [],
        location: listing.location_id || '',
        email: listing.email || '',
        mobile: listing.mobile || '',
        website: listing.website || 'https://',
        whatsapp: listing.whatsapp || '',
        address: listing.address || '',
    });

    const [selected, setSelected] = useState([]);

    useEffect(() => {
        if(listing.select !== undefined){
            setSelected(listing.select);
        }
        
        // if(selected != ''){
        //     setData('category', selected);
        // }
       
    }, [listing]);

    

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    };

    const selectHandle = (val) =>{
        let slength = Object.keys(val).length;
        if(slength <= 5){
            setSelected(val);
            setData('category', val);
            clearErrors('category')
        }else{
            Swal.fire('Alert!','Maximum 5 Categories Allowed','warning');
        }
    }

    const submitHandeler = (e) =>{
        e.preventDefault();
        if(props.typ == 'add'){
            post(route('listing.store'),{ 
                onSuccess: () =>{
                    props.setActive('logo');
                    Swal.fire('Saved Successfully!','','success');
                }
            });
        }else if(props.typ == 'edit'){
            put(route('listing.update', listing.id),{
                onSuccess: () =>{
                    props.setActive('logo');
                    Swal.fire('Saved Successfully!','','success');
                }
            });
        }
        
    }

    return (
        <div id="v-pills-basic" className="form-container show active tab-pane ">
            <form onSubmit={submitHandeler}>
                <div className="row form-row">
                    <div className="col-md-2">
                        <label htmlFor="">Business Name</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-6">
                        <Input type="text" name="business_name" value={data.business_name} className={errors.business_name && 'inerror'} placeholder="Enter Business Name"
                            isFocused={true} handleChange={onHandleChange}/>
                            {errors.business_name &&  <div className="smart-valid">{errors.business_name}</div> }
                    </div>
                </div>  

                <div className="row form-row">
                    <div className="col-md-2">
                        <label htmlFor="">Description</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-6">
                        <textarea type="text" name="description" value={data.description} className={`form-control ${errors.description && 'inerror'}`}
                            placeholder="Write a Short Description about your Business" onChange={onHandleChange}></textarea>
                            {errors.description &&  <div className="smart-valid">{errors.description}</div> }
                    </div>
                </div>  

                <div className="row form-row">
                    <div className="col-md-2">
                        <label htmlFor="">Select Category</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-4">
                        <MultiSelect
                            options={category}
                            value={selected}
                            onChange={selectHandle}
                            className={errors.category && 'inerror'}
                            labelledBy="Select"
                            hasSelectAll={false}
                        />
                        {errors.category &&  <div className="smart-valid">{errors.category}</div> }
                    </div>
                    <div className="col-md-2">
                        <label htmlFor="">Select Location</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-4">
                        <select value={data.location} onChange={onHandleChange} name="location" id="" className={`form-control ${errors.location && 'inerror'}`}>
                            <option value="">Select Location</option>
                            {
                                location && location.map((l, i)=>{
                                    return <option key={i} value={l.id}>{l.name}</option>
                                })
                            }
                        </select>
                        {errors.location &&  <div className="smart-valid">{errors.location}</div> }
                    </div>
                </div> 

                <div className="row form-row">
                    <div className="col-md-2">
                        <label htmlFor="">Email Address</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-4">
                        <Input type="text" name="email" value={data.email} className={errors.email && 'inerror'} placeholder="Enter Email Address"
                            isFocused={true} handleChange={onHandleChange}/>
                        {errors.email &&  <div className="smart-valid">{errors.email}</div> }
                    </div>
                    <div className="col-md-2">
                        <label htmlFor="">Mobile Number</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-4">
                        <Input type="number" name="mobile" value={data.mobile} className={errors.mobile && 'inerror'} placeholder="Enter Mobile Number"
                            isFocused={true} handleChange={onHandleChange}/>
                        {errors.mobile &&  <div className="smart-valid">{errors.mobile}</div> }
                    </div>
                </div>  

                
                <div className="row form-row">
                    <div className="col-md-2">
                        <label htmlFor="">Website</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-4">
                        <Input type="text" name="website" value={data.website} className={errors.website && 'inerror'} placeholder="Enter Website Address"
                            isFocused={true} handleChange={onHandleChange}/>
                        {errors.website &&  <div className="smart-valid">{errors.website}</div> }
                    </div>
                    <div className="col-md-2">
                        <label htmlFor="">WhatsApp</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-4">
                        <Input type="number" name="whatsapp" value={data.whatsapp} className={errors.whatsapp && 'inerror'} placeholder="Enter Whatsapp Nummber"
                            isFocused={true} handleChange={onHandleChange}/>
                        {errors.whatsapp &&  <div className="smart-valid">{errors.whatsapp}</div> }
                    </div>
                </div>  


                <div className="row form-row">
                    <div className="col-md-2">
                        <label htmlFor="">Address</label>
                        <span className="spcol">:</span>
                    </div>
                    <div className="col-md-4">
                        <textarea type="text" name="address" rows={3} value={data.address} className={`form-control ${errors.address && 'inerror'}`}
                            placeholder="Enter your Address" onChange={onHandleChange}></textarea>
                            {errors.address &&  <div className="smart-valid">{errors.address}</div> }
                    </div>
                </div> 

                <div className="row form-row">
                    <div className="col-md-2">
                        
                    </div>
                    <div className="col-md-4">
                    <button disabled={processing} className="btn btn-primary">Save and Continue</button>
                    </div>
                </div> 
            </form>
        </div>
    )
}
export default BasicDetails