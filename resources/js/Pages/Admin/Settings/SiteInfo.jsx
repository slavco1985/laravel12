import React, { useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import WebsiteLogo from './Inc/WebsiteLogo';
import FavIcon from './Inc/FavIcon';
import TitleDescription from './Inc/TitleDescription';
import ContactDetails from './Inc/ContactDetails';
import SocialLinks from './Inc/SocailLinks';

const SiteInfo = (props) =>{
   return(
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Site Info" path="Settings" pathurl="" />
            <div className="row">
                <div className="col-md-6">
                    <WebsiteLogo logo={props.info.logo} />
                    <br />
                    <FavIcon fav={props.info.fav} />
                    <br />
                    <TitleDescription info={props.info} />
                </div>
                <div className="col-md-6">
                    <ContactDetails info={props.info} />
                    <br />
                    <SocialLinks info={props.info} />
                    <br />
                </div>
            </div>
       </Authenticated>
   )
}
export default SiteInfo
