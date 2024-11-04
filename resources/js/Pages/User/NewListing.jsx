import User from '@/Layouts/User';
import React, { useEffect,useState} from 'react';
import BasicDetails from './Form/BasicDetails';
import TabLink from './Form/Shared/TabLink';
import Path from './Shared/Path';

const NewListing = (props) =>{

    const [active, setActive] = useState('basic');
    const [typ, setTyp] = useState('');
    const [lid, setLid] = useState(props.listing.id)
   
    useEffect(()=>{
        if(props.typ !== undefined){
            setTyp(props.typ);
            setLid(props.listing.id)
        }
    },[props])

    
    

    return (
        <User>
            {
                typ == 'edit' ? <Path title="Edit Listing" /> : <Path title="Add New Listing" />
            }
            
            <div className="container">
                <div className="row new-listing">
                    <div className="col-md-10 p-0 listing-col mx-auto">
                        <div className="card shadow text-center">
                            <div className="card-header p-0">
                                    <TabLink active={active} typ={typ} lid={lid}  />
                            </div>
                            <div className="card-body tab-content p-0">
                                <BasicDetails category={props.category} typ={typ} listing={props.listing} location={props.location} setActive={setActive}  />
                            </div>
                            <div className="card-footer text-muted">
                                <div className="row">
                                    <div className="col-md-6 pt-2 left">
                                        <p>Step 1 of 7</p>
                                    </div>
                                    <div className="col-md-6 right">
                                       <button className="btn disabled btn-light">Skip and Go to Dashboard</button> 
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </User>
    )
}
export default NewListing