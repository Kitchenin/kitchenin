import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'htmlToText'
})
export class HtmlToTextPipe implements PipeTransform {

  transform(value: any, args?: any): any {
    if (!value) {
      return value;
    }

    var regex = /(<([^>]+)>)/ig;
    return value.replace(regex, "");
  }
}
